<script setup lang="ts">
import Header from '@/components/Header.vue';
import Hero from '@/components/Hero.vue';
import Venue from '@/pages/Venue.vue';
import Hotels from '@/pages/Hotels.vue';
import Registry from '@/pages/Registry.vue';
import Taxis from '@/pages/Taxis.vue';
import Form from '@/pages/Form.vue';
import Gallery from '@/pages/Gallery.vue';
import Itinerary from '@/pages/Itinerary.vue';
import { onMounted } from 'vue';

const props = defineProps<{
    submitted_be?: boolean;
    code?: string;
    people?: Guest[];
}>();

onMounted(() => {
    // Check if there's a hash in the URL and scroll to it
    if (window.location.hash) {
        setTimeout(() => {
            const element = document.querySelector(window.location.hash);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }, 100);
    }
});
</script>

<template>
    <div class="flex flex-col min-h-screen overflow-hidden">

        <!-- Site header -->
        <Header />

        <!-- Page content -->
        <main class="grow mb-6">
            <Hero />
            <Form :submitted_be="props.submitted_be" :code="props.code" :people="props.people"/>
            <Venue />
            <Gallery />
            <Hotels/>
            <Itinerary/>
            <Registry/>
            <Taxis/>

            <!-- Other sections will go here -->
        </main>

        <!-- Site footer -->
<!--         <Footer year="2025" />-->

    </div>
</template>

