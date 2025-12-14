<script setup lang="ts">
import { ref } from 'vue';

interface Photo {
    url: string;
    caption?: string;
}

const photos = ref<Photo[]>([
    { url: 'https://aardvark-cdn.s3.eu-west-2.amazonaws.com/82707EAE-117A-407D-B46F-A6ADA6E8952B.jpeg', caption: 'Engagement day!' },
    { url: 'https://aardvark-cdn.s3.eu-west-2.amazonaws.com/02A275A8-4913-42FC-ADD1-1ED1155792DD.jpeg', caption: 'Halloween party' },
    { url: 'https://aardvark-cdn.s3.eu-west-2.amazonaws.com/B2CA8CDB-9F25-45EA-A1E4-F0F296AB9A0F.jpeg', caption: 'Day out in Edinburgh' },
    { url: 'https://aardvark-cdn.s3.eu-west-2.amazonaws.com/7162A8DE-28C8-4835-A2CE-0D16C48B555F.jpeg', caption: 'Happy times' },
    { url: 'https://aardvark-cdn.s3.eu-west-2.amazonaws.com/9AA8D918-54AD-4EBF-B914-8D819169FACC.jpeg', caption: 'A day out' },
    // Add more photos as needed
]);

const currentIndex = ref(0);

const nextPhoto = () => {
    currentIndex.value = (currentIndex.value + 1) % photos.value.length;
};

const prevPhoto = () => {
    currentIndex.value = (currentIndex.value - 1 + photos.value.length) % photos.value.length;
};

const goToPhoto = (index: number) => {
    currentIndex.value = index;
};
</script>

<template>
    <section id="gallery">
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

            <div class="py-12 md:py-12">

                <!-- Section header -->
                <div class="max-w-3xl mx-auto mb-12 text-center">
                    <h2 class="text-4xl md:text-5xl font-montaga text-[#2B1105] mb-4">Photos Gallery</h2>
                    <p class="text-lg text-[#2B1105]/70 font-montaga">
                        Some of our favourite moments together so far
                    </p>
                </div>

                <!-- Carousel -->
                <div class="relative max-w-md mx-auto">

                    <!-- Main photo -->
                    <div class="relative aspect-[9/14] rounded-3xl overflow-hidden bg-[#2B1105]/5">
                        <img
                            :src="photos[currentIndex].url"
                            :alt="photos[currentIndex].caption || `Photo ${currentIndex + 1}`"
                            class="w-full h-full object-cover"
                        />

                        <!-- Caption overlay -->
                        <div
                            v-if="photos[currentIndex].caption"
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-[#2B1105]/80 to-transparent p-6"
                        >
                            <p class="text-[#FCF9F7] font-montaga text-center">
                                {{ photos[currentIndex].caption }}
                            </p>
                        </div>
                    </div>

                    <!-- Navigation buttons -->
                    <button
                        @click="prevPhoto"
                        class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-[#FCF9F7] text-[#2B1105] rounded-full shadow-lg hover:bg-[#FCF9F7]/90 transition-colors flex items-center justify-center"
                        aria-label="Previous photo"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>

                    <button
                        @click="nextPhoto"
                        class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-[#FCF9F7] text-[#2B1105] rounded-full shadow-lg hover:bg-[#FCF9F7]/90 transition-colors flex items-center justify-center"
                        aria-label="Next photo"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <!-- Dots indicator -->
                    <div class="flex justify-center gap-2 mt-6">
                        <button
                            v-for="(photo, index) in photos"
                            :key="index"
                            @click="goToPhoto(index)"
                            :class="[
                'w-2 h-2 rounded-full transition-all',
                index === currentIndex
                  ? 'bg-[#2B1105] w-8'
                  : 'bg-[#2B1105]/30 hover:bg-[#2B1105]/50'
              ]"
                            :aria-label="`Go to photo ${index + 1}`"
                        ></button>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>
