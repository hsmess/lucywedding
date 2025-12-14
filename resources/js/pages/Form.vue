<script setup lang="ts">
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import axios from 'axios';

interface Guest {
    id?: number;
    name: string;
    has_plus_one: boolean;
    plus_one_id?: number | null;
    attending: boolean | null;
    dietary_requirements: string | null;
    song_request: string | null;
    other_comments: string | null;
}

const props = defineProps<{
    code?: string;
    people?: Guest[];
}>();

const floralImage = ref('https://aardvark-cdn.s3.eu-west-2.amazonaws.com/floral.png');
const invitationCode = ref(props.code || '');
const hasValidCode = ref(!!props.code && !!props.people);

// Deep clone the people data to make it reactive and editable
const guests = ref<Guest[]>(
    props.people
        ? JSON.parse(JSON.stringify(props.people)).map((g: any) => {
            console.log('Raw guest data:', g);
            console.log('Attending value:', g.attending, 'Type:', typeof g.attending);
            return {
                ...g,
                attending: g.attending === null ? null : Boolean(g.attending),
                dietary_requirements: g.dietary_requirements ?? null,
                song_request: g.song_request ?? null,
                other_comments: g.other_comments ?? null,
            };
        })
        : []
);

console.log('Initialized guests:', guests.value);

const loading = ref(false);
const error = ref('');
const submitting = ref(false);
const submitted = ref(false);

const fetchInvitation = async () => {
    if (!invitationCode.value.trim()) {
        error.value = 'Please enter your code';
        return;
    }

    // Redirect to the same page with the code as a query param
    // Laravel will handle fetching the invitation data
    router.get('/', { invitation_code: invitationCode.value });
};

const submitRsvp = async () => {
    submitting.value = true;
    error.value = '';

    try {
        await axios.post(`/api/rsvp/${invitationCode.value}`, {
            guests: guests.value
        });
        submitted.value = true;
    } catch (err: any) {
        error.value = err.response?.data?.message || 'Failed to submit RSVP. Please try again.';
    } finally {
        submitting.value = false;
    }
};

const addPlusOne = (guestIndex: number) => {
    const mainGuest = guests.value[guestIndex];

    // Add a new guest as a plus one
    guests.value.splice(guestIndex + 1, 0, {
        name: '',
        has_plus_one: false,
        plus_one_id: mainGuest.id,
        attending: true,
        dietary_requirements: null,
        song_request: null,
        other_comments: null
    });
};

const removePlusOne = (guestIndex: number) => {
    guests.value.splice(guestIndex, 1);
};

const isPlusOne = (guest: Guest) => {
    // A guest is a plus one if any other guest has this guest's ID as their plus_one_id
    return guests.value.some(g => g.plus_one_id === guest.id);
};

const canAddPlusOne = (guest: Guest, index: number) => {
    // Can add plus one if:
    // 1. Guest has_plus_one flag is true
    // 2. Guest is attending
    // 3. No plus one already added (next guest is not their plus one)
    if (!guest.has_plus_one || !guest.attending) return false;

    const nextGuest = guests.value[index + 1];
    return !nextGuest || nextGuest.plus_one_id !== guest.id;
};
</script>

<template>
    <section id="rsvp">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="relative">

                <!-- Background -->
                <div class="absolute inset-0 bg-[#2B1105] rounded-3xl -mx-20 -z-10 overflow-hidden" aria-hidden="true">
                    <!-- Floral decoration - top left -->
                    <div class="absolute top-0 left-0 w-48 md:w-64 opacity-20 pointer-events-none">
                        <img :src="floralImage" alt="Floral decoration" class="w-full h-auto" />
                    </div>

                    <!-- Floral decoration - bottom right -->
                    <div class="absolute bottom-0 right-0 w-48 md:w-64 opacity-20 pointer-events-none transform scale-x-[-1]">
                        <img :src="floralImage" alt="Floral decoration" class="w-full h-auto" />
                    </div>
                </div>

                <!-- Content -->
                <div class="py-12 md:py-20 -mx-20 px-20">

                    <!-- Code Entry State -->
                    <div v-if="!hasValidCode" class="max-w-2xl mx-auto text-center">
                        <h2 class="text-3xl md:text-4xl font-montaga text-[#FCF9F7] mb-4">RSVP</h2>
                        <p class="text-[#FCF9F7]/70 font-montaga mb-8">
                            Please enter your unique code to access your RSVP form
                        </p>

                        <div class="space-y-4">
                            <input
                                v-model="invitationCode"
                                type="text"
                                placeholder="Enter your code"
                                class="w-full px-6 py-4 bg-[#FCF9F7] text-[#2B1105] font-montaga rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FCF9F7] placeholder:text-[#2B1105]/40"
                                @keyup.enter="fetchInvitation"
                            />

                            <button
                                @click="fetchInvitation"
                                :disabled="loading"
                                class="w-full px-6 py-4 bg-[#FCF9F7] text-[#2B1105] font-montaga rounded-lg hover:bg-[#FCF9F7]/90 transition-colors disabled:opacity-50"
                            >
                                {{ loading ? 'Loading...' : 'Continue' }}
                            </button>

                            <p v-if="error" class="text-red-300 font-montaga text-sm">
                                {{ error }}
                            </p>
                        </div>
                    </div>

                    <!-- RSVP Form State -->
                    <div v-else-if="!submitted" class="max-w-3xl mx-auto">
                        <h2 class="text-3xl md:text-4xl font-montaga text-[#FCF9F7] mb-8 text-center">RSVP</h2>

                        <form @submit.prevent="submitRsvp" class="space-y-8">

                            <!-- Guests -->
                            <div class="space-y-6">
                                <div
                                    v-for="(guest, index) in guests"
                                    :key="index"
                                    class="p-6 bg-[#FCF9F7] rounded-2xl space-y-4"
                                >
                                    <!-- Guest name and attending -->
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <input
                                                v-if="isPlusOne(guest)"
                                                v-model="guest.name"
                                                type="text"
                                                placeholder="Guest name"
                                                class="w-full px-4 py-2 text-[#2B1105] font-montaga rounded-lg border border-[#2B1105]/20 focus:outline-none focus:ring-2 focus:ring-[#2B1105]"
                                            />
                                            <h3 v-else class="text-xl font-montaga text-[#2B1105]">{{ guest.name }}</h3>
                                        </div>

                                        <button
                                            v-if="isPlusOne(guest)"
                                            @click="removePlusOne(index)"
                                            type="button"
                                            class="ml-4 text-[#2B1105]/60 hover:text-[#2B1105] font-montaga text-sm"
                                        >
                                            Remove
                                        </button>
                                    </div>

                                    <!-- Attending -->
                                    <div>
                                        <label class="text-[#2B1105] font-montaga mb-2 block">Will you be attending?</label>
                                        <div class="flex gap-4">
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input
                                                    v-model="guest.attending"
                                                    type="radio"
                                                    :name="`attending-${index}`"
                                                    :value="true"
                                                    class="w-4 h-4"
                                                />
                                                <span class="font-montaga text-[#2B1105]">Yes, I'll be there!</span>
                                            </label>
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input
                                                    v-model="guest.attending"
                                                    type="radio"
                                                    :name="`attending-${index}`"
                                                    :value="false"
                                                    class="w-4 h-4"
                                                />
                                                <span class="font-montaga text-[#2B1105]">Sorry, can't make it</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Dietary requirements (only if attending) -->
                                    <div v-if="guest.attending">
                                        <label class="text-[#2B1105] font-montaga mb-2 block">Dietary requirements</label>
                                        <textarea
                                            v-model="guest.dietary_requirements"
                                            rows="2"
                                            placeholder="Any allergies or dietary preferences?"
                                            class="w-full px-4 py-2 text-[#2B1105] font-montaga rounded-lg border border-[#2B1105]/20 focus:outline-none focus:ring-2 focus:ring-[#2B1105] resize-none"
                                        ></textarea>
                                    </div>

                                    <!-- Song request (only if attending) -->
                                    <div v-if="guest.attending">
                                        <label class="text-[#2B1105] font-montaga mb-2 block">Song request</label>
                                        <input
                                            v-model="guest.song_request"
                                            type="text"
                                            placeholder="What song would you like to hear?"
                                            class="w-full px-4 py-2 text-[#2B1105] font-montaga rounded-lg border border-[#2B1105]/20 focus:outline-none focus:ring-2 focus:ring-[#2B1105]"
                                        />
                                    </div>

                                    <!-- Other comments (only if attending) -->
                                    <div v-if="guest.attending">
                                        <label class="text-[#2B1105] font-montaga mb-2 block">Any other comments?</label>
                                        <textarea
                                            v-model="guest.other_comments"
                                            rows="3"
                                            placeholder="Anything else we should know?"
                                            class="w-full px-4 py-2 text-[#2B1105] font-montaga rounded-lg border border-[#2B1105]/20 focus:outline-none focus:ring-2 focus:ring-[#2B1105] resize-none"
                                        ></textarea>
                                    </div>

                                    <!-- Add plus one button -->
                                    <div v-if="canAddPlusOne(guest, index)">
                                        <button
                                            @click="addPlusOne(index)"
                                            type="button"
                                            class="text-[#2B1105] font-montaga text-sm hover:underline"
                                        >
                                            + Add a plus one
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button
                                type="submit"
                                :disabled="submitting"
                                class="w-full px-6 py-4 bg-[#FCF9F7] text-[#2B1105] font-montaga rounded-lg hover:bg-[#FCF9F7]/90 transition-colors disabled:opacity-50 text-lg"
                            >
                                {{ submitting ? 'Submitting...' : 'Submit RSVP' }}
                            </button>

                            <p v-if="error" class="text-red-300 font-montaga text-sm text-center">
                                {{ error }}
                            </p>
                        </form>
                    </div>

                    <!-- Success State -->
                    <div v-else class="max-w-2xl mx-auto text-center">
                        <h2 class="text-3xl md:text-4xl font-montaga text-[#FCF9F7] mb-4">Thank You!</h2>
                        <p class="text-[#FCF9F7]/70 font-montaga text-lg">
                            Your RSVP has been submitted successfully. We can't wait to celebrate with you!
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </section>
</template>
