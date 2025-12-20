<template>
    <section id="home" class="relative bg-[#FCF9F7]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="pt-32 pb-12 md:pt-40 md:pb-20">

                <!-- Content -->
                <div class="relative max-w-xl mx-auto md:max-w-none text-center">

                    <!-- Floral decoration - top right (desktop only) -->
                    <div v-if="floralImage" class="hidden md:block absolute -top-8 -right-8 md:-right-16 w-48 md:w-64 opacity-90 pointer-events-none">
                        <img :src="floralImage" alt="Floral decoration" class="w-full h-auto" />
                    </div>

                    <!-- Floral decoration - mobile centered at top -->
                    <div v-if="floralImage" class="md:hidden mx-auto w-40 mb-6 opacity-90">
                        <img :src="floralImage" alt="Floral decoration" class="w-full h-auto" />
                    </div>

                    <!-- Content -->
                    <div class="py-6 md:py-20">
                        <!-- Pre-heading -->
                        <p class="text-base md:text-lg lg:text-xl text-[#2B1105]/60 mb-4 md:mb-6 font-montaga">
                            Please join us to celebrate
                        </p>

                        <!-- Couple names -->
                        <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-montaga text-[#2B1105] mb-6 md:mb-8">
                            Lucy <span class="text-[#2B1105]/40">&</span> Greg
                        </h1>

                        <!-- Date and location -->
                        <div class="text-lg sm:text-xl md:text-2xl text-[#2B1105]/80 font-montaga mb-8 md:mb-12">
                            <p class="mb-2">Saturday, 27th June 2026</p>
                            <p>Liverpool</p>
                        </div>
                        <div class="pt-2">
                            <a
                                href="#rsvp"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-[#2B1105] text-[#FCF9F7] font-montaga rounded-lg hover:bg-[#2B1105]/90 transition-colors"
                            >
                                RSVP now
                            </a>
                        </div>

                    </div>

                    <!-- Floral decoration - bottom left (desktop only) -->
                    <div v-if="floralImage" class="hidden md:block absolute -bottom-8 -left-8 md:-left-16 w-48 md:w-64 opacity-90 pointer-events-none transform scale-x-[-1]">
                        <img :src="floralImage" alt="Floral decoration" class="w-full h-auto" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { ref } from 'vue';

// Floral image from CDN
const floralImage = ref('https://aardvark-cdn.s3.eu-west-2.amazonaws.com/floral.png');
</script>
