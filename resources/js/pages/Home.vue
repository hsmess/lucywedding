<script setup lang="ts">
import Header from '@/components/Header.vue';
import Hero from '@/components/Hero.vue';
import Venue from '@/pages/Venue.vue';
import Hotels from '@/pages/Hotels.vue';
import Registry from '@/pages/Registry.vue';
import Taxis from '@/pages/Taxis.vue';
import Form from '@/pages/Form.vue';
import Footer from '@/pages/Footer.vue';
import Gallery from '@/pages/Gallery.vue';

const props = defineProps<{
    code?: string;
    people?: Guest[];
}>();
</script>

<template>
    <div class="flex flex-col min-h-screen overflow-hidden">

        <!-- Site header -->
        <Header />

        <!-- Page content -->
        <main class="grow">
            <Hero />
            <Venue />
            <Gallery />
            <Hotels/>
            <Registry/>
            <Taxis/>
            <Form :code="props.code" :people="props.people"/>

            <!-- Other sections will go here -->
        </main>

        <!-- Site footer -->
         <Footer year="2025" />

    </div>
</template>

