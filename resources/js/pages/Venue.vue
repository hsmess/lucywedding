<script setup lang="ts">
import { ref } from 'vue';

// Venue data - this will come from Sanity CMS later
const venueImage = ref('https://aardvark-cdn.s3.eu-west-2.amazonaws.com/Palm_House_309937606.jpeg'); // Replace with actual venue photo
const venueName = ref('The Palmhouse');
const venueDescription = ref('A beautiful and elegant space perfect for celebrating our special day with family and friends.');
const venueAddress = ref(`Sefton Park, Liverpool L17 1AP`);
const gettingThere = ref('The venue is easily accessible by car and public transport. Liverpool Lime Street station is a short taxi-ride away, and Liverpool John Lennon airport is also close.');
const parkingInfo = ref('Free parking is available on-site for all guests.');
const mapLink = ref('https://www.google.com/maps/place/Sefton+Park+Car+Parking/@53.3825612,-2.9403656,16.8z/data=!4m14!1m7!3m6!1s0x487b205bffd63f0d:0xeb0db1eb0771127e!2sSefton+Park+Palm+House!8m2!3d53.3813003!4d-2.9352546!16s%2Fg%2F1tfdyd06!3m5!1s0x487b21b7300db625:0xaa899dca1dc650ab!8m2!3d53.3808747!4d-2.9407949!16s%2Fg%2F11n0gj1nhk?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D'); // Replace with actual Google Maps link
</script>

<template>
  <section id="venue">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <!-- Decorative divider -->
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
          <h2 class="text-4xl md:text-5xl font-montaga text-[#2B1105] mb-4">The Venue</h2>
          <p class="text-lg text-[#2B1105]/70 font-montaga">
            Join us at this beautiful location to celebrate our special day
          </p>
        </div>

        <div class="lg:flex lg:gap-12 xl:gap-20 items-start">

          <!-- Venue Image -->
          <div class="flex-1 mb-8 lg:mb-0">
            <div class="rounded-3xl overflow-hidden shadow-xl">
              <img
                  :src="venueImage"
                  alt="Venue"
                  class="w-full h-auto object-cover"
              />
            </div>
          </div>

          <!-- Venue Details -->
          <div class="flex-1">
            <div class="space-y-6">

              <!-- Venue Name -->
              <div>
                <h3 class="text-2xl md:text-3xl font-montaga text-[#2B1105] mb-2">
                  {{ venueName }}
                </h3>
                <p class="text-[#2B1105]/70 font-montaga">
                  {{ venueDescription }}
                </p>
              </div>

              <!-- Address -->
              <div>
                <h4 class="text-lg font-montaga text-[#2B1105] mb-2 font-semibold">Address</h4>
                <p class="text-[#2B1105]/70 font-montaga whitespace-pre-line">
                  {{ venueAddress }}
                </p>
              </div>

              <!-- Getting There -->
              <div>
                <h4 class="text-lg font-montaga text-[#2B1105] mb-2 font-semibold">Getting There</h4>
                <p class="text-[#2B1105]/70 font-montaga">
                  {{ gettingThere }}
                </p>
              </div>

              <!-- Parking -->
              <div v-if="parkingInfo">
                <h4 class="text-lg font-montaga text-[#2B1105] mb-2 font-semibold">Parking</h4>
                <p class="text-[#2B1105]/70 font-montaga">
                  {{ parkingInfo }}
                </p>
              </div>

              <!-- Map Link/Button -->
              <div class="pt-4">
                <a
                    :href="mapLink"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#2B1105] text-[#FCF9F7] font-montaga rounded-lg hover:bg-[#2B1105]/90 transition-colors"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                  View on Google Maps
                </a>
              </div>

            </div>
          </div>

        </div>

      </div>
    </div>
  </section>
</template>

