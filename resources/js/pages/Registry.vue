<script setup lang="ts">
import { ref } from 'vue';

const floralImage = ref('https://aardvark-cdn.s3.eu-west-2.amazonaws.com/floral.png');
</script>

<template>
    <section id="registry">
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

            <div class="py-6 md:py-12">

                <!-- Registry Banner -->
                <div class="relative bg-[#FCF9F7] border-2 border-[#2B1105]/10 rounded-3xl overflow-hidden">

                    <!-- Floral decoration - left -->
                    <div class="absolute top-0 left-0 w-32 md:w-48 opacity-40 pointer-events-none">
                        <img :src="floralImage" alt="Floral decoration" class="w-full h-auto" />
                    </div>

                    <!-- Floral decoration - right -->
                    <div class="absolute bottom-0 right-0 w-32 md:w-48 opacity-40 pointer-events-none transform scale-x-[-1]">
                        <img :src="floralImage" alt="Floral decoration" class="w-full h-auto" />
                    </div>

                    <!-- Content -->
                    <div class="relative py-16 md:py-20 px-8 md:px-16 text-center">
                        <h2 class="text-3xl md:text-4xl font-montaga text-[#2B1105] mb-6">
                            Registry
                        </h2>
                        <p class="text-lg md:text-xl text-[#2B1105]/80 font-montaga max-w-2xl mx-auto leading-relaxed">
                            If anyone would like to give a wedding gift, the couple would appreciate gifts of money towards their honeymoon
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </section>
</template>
