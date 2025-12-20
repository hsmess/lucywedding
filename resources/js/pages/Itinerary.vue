<script setup lang="ts">
import { ref } from 'vue';

interface ItineraryItem {
    time: string;
    title: string;
    description?: string;
}

const itineraryImage = ref('https://aardvark-cdn.s3.eu-west-2.amazonaws.com/palmhouse_website.jpg');

const itinerary = ref<ItineraryItem[]>([
    { time: '13:30', title: 'Guests begin to arrive', description: 'At the Palm House, Liverpool' },
    { time: '14:00', title: 'Ceremony begins' },
    { time: '14:30', title: 'Welcome drinks', description: 'With outdoor music!' },
    { time: '16:00', title: 'Guests take seats for dinner' },
    { time: '16:10', title: 'Bride and Groom announced' },
    { time: '16:15', title: 'Dinner served' },
    { time: '18:00', title: 'Speeches' },
    { time: '19:30', title: 'Evening Reception', description: 'With cash bar'  },
    { time: '20:00', title: 'Cutting of the cake' },
    { time: '21:30', title: 'Evening food served' },
    { time: '23:30', title: 'Last Orders' },
    { time: '00:00', title: 'Carriages' },
    // Add more items as needed
]);
</script>

<template>
    <section id="itinerary">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <!-- Decorative divider -->
            <div class="flex items-center justify-center py-8 md:py-12">
                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#2B1105]/20 to-transparent"></div>
                <div class="px-4">
                    <svg class="w-6 h-6 text-[#2B1105]/30" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </div>
                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#2B1105]/20 to-transparent"></div>
            </div>

            <div class="pb-12 md:pb-20">

                <!-- Section header -->
                <div class="mb-12 text-center">
                    <h2 class="text-4xl md:text-5xl font-montaga text-[#2B1105] mb-4">Itinerary</h2>
                    <p class="text-lg text-[#2B1105]/70 font-montaga">
                        Here's how the day will unfold
                    </p>
                </div>

                <!-- Image + Timeline layout -->
                <div class="lg:grid lg:grid-cols-2 lg:gap-16 lg:items-start">

                    <!-- Fixed image - hidden on mobile -->
                    <div class="hidden lg:block">
                        <div class="pt-40">
                            <img
                                :src="itineraryImage"
                                alt="Wedding day"
                                class="w-full rounded-3xl shadow-lg object-cover aspect-[3/4]"
                            />
                        </div>
                    </div>

                    <div>
                        <div class="space-y-6 lg:text-left text-center">
                            <div
                                v-for="(item, index) in itinerary"
                                :key="index"
                                class="flex items-start gap-6"
                            >
                                <!-- Time -->
                                <div class="shrink-0 w-20 text-right">
                                    <span class="text-xl font-montaga text-[#2B1105]">{{ item.time }}</span>
                                </div>

                                <!-- Content -->
                                <div class="flex-1 pb-6 border-b border-[#2B1105]/10 last:border-0">
                                    <h3 class="text-xl md:text-2xl font-montaga text-[#2B1105] mb-1">
                                        {{ item.title }}
                                    </h3>
                                    <p v-if="item.description" class="text-[#2B1105]/70 font-montaga">
                                        {{ item.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</template>

<style scoped></style>
