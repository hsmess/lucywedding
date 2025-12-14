<script setup lang="ts">
import { ref } from 'vue';

interface TaxiFirm {
    name: string;
    phone?: string;
    link?: string;
    logo?: string;
}

const taxiFirms = ref<TaxiFirm[]>([
    {
        name: 'Uber',
        link: 'https://www.uber.com/gb/en/ride/',
        logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Uber_logo_2018.svg/2560px-Uber_logo_2018.svg.png' // Replace with actual logo
    },
    {
        name: 'Delta Taxis',
        phone: '0151 922 7373',
        link: 'https://www.deltataxis.net/',
        logo: 'https://taxisummit.com/wp-content/uploads/2023/04/delta-taxis.jpeg' // Replace with actual logo
    },
    {
        name: 'Alpha Taxis',
        phone: '0151 722 8888',
        link: 'https://alphataxis.co.uk/',
        logo: 'https://alphataxis.co.uk/wp-content/uploads/2018/11/ALPHA-Taxis-Long-logo-outlined-2.png' // Replace with actual logo
    },
    {
        name: 'Village Taxis',
        phone: '0151 427 7909',
        logo: 'https://pbs.twimg.com/profile_images/3337173567/4e8ffc04f818e542411cdb1b9a9cb662_400x400.png' // Replace with actual logo
    }
]);
</script>

<template>
    <section id="taxis">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="relative">

                <!-- Border box -->
                <div class="border-2 border-[#2B1105] rounded-3xl -mx-20" aria-hidden="true"></div>

                <div class="py-12 md:py-20 -mx-20 px-20 overflow-hidden">
                    <div class="lg:flex items-start">

                        <!-- Left content -->
                        <div class="flex-1 mb-12 lg:mb-0">
                            <div class="mb-6">
                                <h2 class="text-3xl md:text-4xl font-montaga text-[#2B1105] mb-2">Local Taxis</h2>
                                <div class="text-[#2B1105]/70 font-montaga space-y-3">
                                    <p>
                                        We recommend booking taxis in advance to ensure availability on the day of the wedding.
                                    </p>
                                    <p>
                                        Here are some local firms we suggest for transport to and from the venue.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Right content -->
                        <div class="lg:w-[640px] lg:ml-12 xl:ml-20">
                            <div class="space-y-12 lg:space-y-20">

                                <!-- Taxi firm -->
                                <div
                                    v-for="(firm, index) in taxiFirms"
                                    :key="index"
                                    class="flex items-start gap-6"
                                >
                                    <!-- Logo -->
                                    <div class="shrink-0">
                                        <img :src="firm.logo" :alt="firm.name" class="w-24 h-12 object-contain" />
                                    </div>

                                    <!-- Details -->
                                    <div class="flex-1">
                                        <div class="text-lg font-montaga text-[#2B1105] mb-3">{{ firm.name }}</div>
                                        <div class="flex flex-wrap gap-3">
                                            <!-- Phone button -->
                                            <a
                                                v-if="firm.phone"
                                                :href="'tel:' + firm.phone.replace(/\s/g, '')"
                                                class="inline-flex items-center gap-2 px-4 py-2 bg-[#2B1105] text-[#FCF9F7] font-montaga text-sm rounded-lg hover:bg-[#2B1105]/90 transition-colors"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                </svg>
                                                {{ firm.phone }}
                                            </a>

                                            <!-- Website button -->
                                            <a
                                                v-if="firm.link"
                                                :href="firm.link"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="inline-flex items-center gap-2 px-4 py-2 border-2 border-[#2B1105] text-[#2B1105] font-montaga text-sm rounded-lg hover:bg-[#2B1105]/5 transition-colors"
                                            >
                                                Visit Website
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
</template>
