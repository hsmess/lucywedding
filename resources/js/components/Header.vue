<template>
    <header class="absolute w-full z-30">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16 md:h-20">

                <!-- Site branding -->
                <div class="shrink-0 mr-4">
                    <!-- Couple initials as logo -->
                    <a href="#home" class="block group">
                        <span class="text-2xl font-montaga text-[#2B1105]">L & G</span>
                    </a>
                </div>

                <!-- Desktop navigation -->
                <nav class="hidden md:flex grow">
                    <!-- Desktop navigation links -->
                    <ul class="flex grow justify-end flex-wrap items-center gap-8">
                        <li>
                            <a href="#home" class="font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#venue" class="font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors">
                                Venue
                            </a>
                        </li>
                        <li>
                            <a href="#hotels" class="font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors">
                                Hotels
                            </a>
                        </li>
                        <li>
                            <a href="#registry" class="font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors">
                                Registry
                            </a>
                        </li>
                        <li>
                            <a href="#rsvp" class="font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors">
                                RSVP
                            </a>
                        </li>

                    </ul>
                </nav>

                <!-- Mobile menu button -->
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="md:hidden text-[#2B1105] hover:text-[#2B1105]/70 transition-colors"
                    aria-label="Toggle menu"
                >
                    <svg v-if="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

            </div>

            <!-- Mobile navigation -->
            <div
                v-show="mobileMenuOpen"
                class="md:hidden pb-4"
            >
                <ul class="flex flex-col space-y-4">
                    <li>
                        <a
                            href="#home"
                            @click="mobileMenuOpen = false"
                            class="block font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors"
                        >
                            Home
                        </a>
                    </li>
                    <li>
                        <a
                            href="#venue"
                            @click="mobileMenuOpen = false"
                            class="block font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors"
                        >
                            Venue
                        </a>
                    </li>
                    <li>
                        <a
                            href="#itinerary"
                            @click="mobileMenuOpen = false"
                            class="block font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors"
                        >
                            Itinerary
                        </a>
                    </li>
                    <li>
                        <a
                            href="#rsvp"
                            @click="mobileMenuOpen = false"
                            class="block font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors"
                        >
                            RSVP
                        </a>
                    </li>
                    <li>
                        <a
                            href="#registry"
                            @click="mobileMenuOpen = false"
                            class="block font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors"
                        >
                            Registry
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const mobileMenuOpen = ref(false);
</script>
