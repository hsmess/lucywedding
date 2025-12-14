<script setup lang="ts">
import { ref } from 'vue';

interface Hotel {
    name: string;
    distance: string;
    link: string;
    image?: string;
    description?: string;
}

const featuredHotels = ref<Hotel[]>([
    {
        name: 'Sefton Park Hotel',
        distance: '1.5 miles',
        link: 'https://www.seftonparkhotel.co.uk/',
        image: 'https://images.getaroom-cdn.com/image/upload/s--XC0M7Wrr--/c_limit,e_improve,fl_lossy.immutable_cache,h_940,q_auto:good,w_940/v1751870126/0e212dbe8096ff1e2879a90703b33d9c69dd80c8?_a=BACAEuEv&atc=e7cd1cfa', // Replace with actual image
        description: 'Nestled on the edge of Liverpool’s iconic Sefton Park. Once a beloved family home, Sefton Park Hotel now welcomes guests from near and far.'
    },
    {
        name: 'Liverpool Aigburth Hotel By Belvilla',
        distance: '0.5 miles',
        link: 'https://www.top-hotels-uk.com/en/h/aigburthbybelvilla.html',
        image: 'https://images.oyoroomscdn.com/uploads/hotel_image/326590/large/rlfdlmvdqcqb.jpg', // Replace with actual image
        description: 'Charming stay overlooking Sefton Park, close to Liverpool city centre'
    },
    {
        name: 'Travelodge Liverpool Aigburth',
        distance: '1.7 miles',
        link: 'https://www.travelodge.co.uk/hotels/467/Liverpool-Aigburth-hotel',
        image: 'https://media.travelodge.co.uk/image/upload/c_fill,h_470,w_850/Rebase/Top%20of%20the%20page/GB1228_Liverpool_Aigburth_EXTERIOR.webp', // Replace with actual image
        description: 'Less than 3 miles from the Liverpool John Lennon Airport and within striking distance of The Liverpool Cricket Club.'
    }
]);

const otherHotels = ref<Hotel[]>([
    {
        name: 'The Mountford Hotel',
        distance: '0.5 miles',
        link: 'https://www.themountfordhotel.com/',
    },
    {
        name: 'The Georgian Town House Hotel',
        distance: '1.4 miles',
        link: 'https://www.urbanbreaks.co.uk/',
    },
    {
        name: 'Hope Street Hotel',
        distance: '1.8 miles',
        link: 'https://www.hopestreethotel.co.uk/'
    },
    {
        name: 'The Baltic Hotel',
        distance: '2.0 miles',
        link: 'https://thebaltichotelliverpool.com/'
    },
    {
        name: 'Novotel Paddington Village',
        distance: '2.0 miles',
        link: 'https://all.accor.com/hotel/B737/index.en.shtml'
    },
    {
        name: 'Travelodge Liverpool Docks',
        distance: '2.2 miles',
        link: 'https://www.travelodge.co.uk/hotels/248/Liverpool-Docks-hotel?WT.tsrc=GHA_Organic&utm_campaign=GHA_Liverpool%20Docks&utm_medium=GHA_Organic&utm_source=google'
    },
    {
        name: 'ibis Liverpool Centre Albert Dock - Liverpool One',
        distance: '2.3 miles',
        link: 'https://all.accor.com/hotel/3140/index.en.shtml?utm_campaign=seo+maps&utm_medium=seo+maps&utm_source=google+Maps'
    },
    {
        name: 'Travelodge Liverpool Central Queens Dock and Arena',
        distance: '2.3 miles',
        link: 'https://www.travelodge.co.uk/hotels/722/Liverpool-Central-Queens-Dock-and-Arena-hotel?utm_source=google&utm_medium=GHA_Organic&utm_campaign=GHA_Liverpool%20Central%20Queens%20Dock%20and%20Arena'
    },
    {
        name: 'Leonardo Hotel Liverpool',
        distance: '2.4 miles',
        link: 'https://www.leonardo-hotels.com/liverpool/leonardo-hotel-liverpool'
    },
    {
        name: 'Travelodge Liverpool Edge Lane',
        distance: '2.5 miles',
        link: 'https://www.travelodge.co.uk/hotels/657/Liverpool-Edge-Lane-hotel?utm_source=google&utm_medium=GHA_Organic&utm_campaign=GHA_Liverpool_Edge_Lane&WT.tsrc=GHA_Organic'
    },
    {
        name: 'Premier Inn Liverpool City Centre (Albert Dock)',
        distance: '2.5 miles',
        link: 'https://www.premierinn.com/gb/en/hotels/england/merseyside/liverpool/liverpool-city-centre-albert-dock.html?cid=GLBC_LIVPLI'
    },
    {
        name: 'Stay City Aparthotel Waterfront',
        distance: '2.9 miles',
        link: 'https://www.staycity.com/liverpool/waterfront'
    },
    {
        name: 'Staycity Aparthotels, Liverpool City Centre',
        distance: '2.9 miles',
        link: 'https://www.staycity.com/liverpool/city-centre'
    },
    {
        name: 'Crowne Plaza John Lennon Airport',
        distance: '3.5 miles',
        link: 'https://www.cpliverpool-johnlennonairport.co.uk/'
    },
    {
        name: 'Travelodge Liverpool John Lennon Airport',
        distance: '4.5 miles',
        link: 'https://www.travelodge.co.uk/hotels/630/Liverpool-John-Lennon-Airport-hotel'
    },
    {
        name: 'Premier Inn Liverpool John Lennon Airport',
        distance: '4.8 miles',
        link: 'https://www.premierinn.com/gb/en/hotels/england/merseyside/liverpool/liverpool-john-lennon-airport.html'
    },
    {
        name: 'Hampton by Hilton John Lennon Airport',
        distance: '5.4 miles',
        link: 'https://www.hilton.com/en/hotels/lpljlhx-hampton-liverpool-john-lennon-airport/'
    }
]);
</script>

<template>
    <section id="hotels">
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

            <div class="py-12 md:py-20">

                <!-- Section header -->
                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">
                    <h2 class="text-4xl md:text-5xl font-montaga text-[#2B1105] mb-4">Accommodation</h2>
                    <p class="text-lg text-[#2B1105]/70 font-montaga">
                        We've compiled a list of nearby hotels to make your stay comfortable
                    </p>
                </div>

                <!-- Featured Hotels -->
                <div class="mb-16">
                    <h3 class="text-2xl md:text-3xl font-montaga text-[#2B1105] mb-8 text-center">Featured Hotels</h3>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div
                            v-for="(hotel, index) in featuredHotels"
                            :key="index"
                            class="bg-[#FCF9F7] border border-[#2B1105]/10 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow"
                        >
                            <div class="aspect-[4/3] overflow-hidden">
                                <img
                                    :src="hotel.image"
                                    :alt="hotel.name"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div class="p-6">
                                <h4 class="font-montaga text-xl text-[#2B1105] mb-2">
                                    {{ hotel.name }}
                                </h4>
                                <div class="flex items-center gap-2 text-sm text-[#2B1105]/60 font-montaga mb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>{{ hotel.distance }}</span>
                                </div>
                                <p class="text-[#2B1105]/70 font-montaga text-sm mb-4">
                                    {{ hotel.description }}
                                </p>
                                <a
                                    :href="hotel.link"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 text-sm font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors"
                                >
                                    View & Book
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other Hotels -->
                <div class="mb-12">
                    <h3 class="text-2xl md:text-3xl font-montaga text-[#2B1105] mb-8 text-center">Other Options</h3>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div
                            v-for="(hotel, index) in otherHotels"
                            :key="index"
                            class="p-6 bg-[#FCF9F7] border border-[#2B1105]/10 rounded-2xl hover:shadow-lg transition-shadow"
                        >
                            <div class="mb-3">
                                <h4 class="font-montaga text-lg text-[#2B1105] mb-2">
                                    {{ hotel.name }}
                                </h4>
                                <div class="flex items-center gap-2 text-sm text-[#2B1105]/60 font-montaga">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>{{ hotel.distance }}</span>
                                </div>
                            </div>
                            <a
                                :href="hotel.link"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 text-sm font-montaga text-[#2B1105] hover:text-[#2B1105]/70 transition-colors"
                            >
                                View & Book
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Alternative options -->
                <div class="mt-12 text-center">
                    <p class="text-[#2B1105]/70 font-montaga mb-4">
                        Looking for alternative accommodation?
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a
                            href="https://www.airbnb.co.uk/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-[#2B1105] text-[#FCF9F7] font-montaga rounded-lg hover:bg-[#2B1105]/90 transition-colors"
                        >
                            Airbnb
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                        <a
                            href="https://www.flatzy.co.uk/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-[#2B1105] text-[#FCF9F7] font-montaga rounded-lg hover:bg-[#2B1105]/90 transition-colors"
                        >
                            Flatzy
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>
