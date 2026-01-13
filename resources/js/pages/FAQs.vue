<script setup lang="ts">
import { ref } from 'vue';
import Header from '@/components/Header.vue';

interface FaqItem {
    question: string;
    answer: string;
}

const faqImage = ref(
    'https://aardvark-cdn.s3.eu-west-2.amazonaws.com/B2CA8CDB-9F25-45EA-A1E4-F0F296AB9A0F.jpeg',
);
const faqImage2 = ref(
    'https://aardvark-cdn.s3.eu-west-2.amazonaws.com/7162A8DE-28C8-4835-A2CE-0D16C48B555F.jpeg',
);

const faqs = ref<FaqItem[]>([
    {
        question: 'What is the RSVP deadline?',
        answer: 'Please RSVP by 25 April 2026 so we can finalise numbers and note all dietary requirements.',
    },
    {
        question: 'Can I bring a plus-one?',
        answer: 'Unfortunately, we are unable to accommodate plus-ones. We want to keep our day intimate and celebrate with those closest to us.',
    },
    {
        question: 'Are children invited?',
        answer: 'Unfortunately, children are not invited unless they have been specifically named on the invitation.',
    },
    {
        question: 'Can I change my RSVP after submitting?',
        answer: 'If you need to make any changes, please contact Lucy via text on 07592 594606 or email lucyfleming96@icloud.com.',
    },
    {
        question: 'What time should I arrive?',
        answer: 'Please arrive at the venue no later than 1:30 PM.',
    },
    {
        question: 'Is the wedding indoors or outdoors?',
        answer: 'The ceremony will be held indoors. Weather permitting, the drinks reception will be outdoors. The wedding breakfast and evening celebrations will be indoors.',
    },
    {
        question: 'How long will the event last?',
        answer: 'Guest arrival is from 1:30 PM. Last orders at the bar will be at 11:30 PM, with the evening ending at 12:00 AM. All guests must vacate the venue by 12:30 AM to avoid fines for the newlyweds.',
    },
    {
        question: 'Is there a dress code?',
        answer: 'We kindly ask guests to wear formal occasion wear. Ladies, please note that a limited number of flip-flops will be available later in the evening for dancing!',
    },
    {
        question: 'Will any part of the wedding be outdoors?',
        answer: 'After the ceremony, welcome drinks will be served outside (weather permitting). As guests will be walking on gravel and grass, we recommend wearing supportive heels or suitable footwear.',
    },
    {
        question: 'Are certain colours encouraged or discouraged?',
        answer: 'Bridesmaids will be wearing burgundy, and groomsmen will be in black tie, so we kindly ask guests to avoid these colours where possible (and white, of course!).',
    },
    {
        question: 'Will alcohol be served?',
        answer: 'Yes. Welcome drinks and wine will be provided at the tables, and there will also be a cash bar available.',
    },
    {
        question: 'Can you accommodate dietary restrictions or allergies?',
        answer: 'Yes. Please ensure all dietary requirements are included in your RSVP. If you need to update anything, contact Lucy via 07592 594606 or lucyfleming96@icloud.com.',
    },
    {
        question: 'What hotels are nearby?',
        answer: '<a class="text-blue-500 underline" href="https://apalmhousecelebration.com/#hotels">Please visit the Hotels tab on our website to view nearby accommodation options and booking details.</a>',
    },
    {
        question: 'Where should I park? Is parking free?',
        answer: 'Free on-site parking is available for all guests.',
    },
    {
        question: 'Are gifts expected?',
        answer: 'Your presence is a gift enough. However, should you wish to give a gift, we would gratefully appreciate a contribution towards our honeymoon.',
    },
    {
        question: 'Can I take photos during the ceremony?',
        answer: 'We kindly ask that you keep all phones and cameras put away during the ceremony and be fully present with us in this special moment.',
    },
    {
        question: 'Will there be assigned seating?',
        answer: 'Assigned seating will be in place for certain family members, bridesmaids, and groomsmen.',
    },
    {
        question: 'Who should I contact if I have questions?',
        answer: '<p>Please feel free to contact: <ul><li>Lucy: 07592 594606 | lucyfleming96@icloud.com</li><li>Greg: 07793 563453</li></ul> </p>',
    }
]);

const openIndex = ref<number | null>(null);

const toggleFaq = (index: number) => {
    openIndex.value = openIndex.value === index ? null : index;
};

const props = defineProps<{}>();
</script>

<template>
    <div class="flex min-h-screen flex-col overflow-hidden">
        <!-- Page content -->
        <main class="mb-6 grow">
            <Header />

            <section class="pt-32 pb-12 md:pb-20">
                <div class="mx-auto max-w-6xl px-4 sm:px-6">
                    <!-- Page header -->
                    <div class="mb-12 text-center md:mb-16">
                        <h1
                            class="mb-4 font-montaga text-5xl text-[#2B1105] md:text-6xl"
                        >
                            Frequently Asked Questions
                        </h1>
                        <p class="font-montaga text-lg text-[#2B1105]/70">
                            Everything you need to know about our special day
                        </p>
                    </div>

                    <!-- Image + FAQ layout -->
                    <div
                        class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-16"
                    >
                        <!-- Fixed image - hidden on mobile -->
                        <div class="hidden lg:block">
                            <div class="sticky pt-24 top-24">
                                <img
                                    :src="faqImage"
                                    alt="FAQ"
                                    class="aspect-[3/4] w-full rounded-3xl object-cover shadow-lg"
                                />
                            </div>

                            <div class="sticky top-24 pt-24">
                                <img
                                    :src="faqImage2"
                                    alt="FAQ2"
                                    class="aspect-[3/4] w-full rounded-3xl object-cover shadow-lg"
                                />
                            </div>
                        </div>

                        <!-- Scrollable FAQ accordion -->
                        <div>
                            <div class="space-y-4">
                                <div
                                    v-for="(faq, index) in faqs"
                                    :key="index"
                                    class="overflow-hidden rounded-2xl border-2 border-[#2B1105]/10 bg-[#FCF9F7] transition-all"
                                    :class="{
                                        'shadow-lg': openIndex === index,
                                    }"
                                >
                                    <!-- Question button -->
                                    <button
                                        @click="toggleFaq(index)"
                                        class="flex w-full items-center justify-between px-6 py-5 text-left transition-colors hover:bg-[#2B1105]/5"
                                    >
                                        <span
                                            class="pr-4 font-montaga text-xl text-[#2B1105] md:text-2xl"
                                        >
                                            {{ faq.question }}
                                        </span>
                                        <svg
                                            class="h-6 w-6 shrink-0 text-[#2B1105] transition-transform duration-200"
                                            :class="{
                                                'rotate-180':
                                                    openIndex === index,
                                            }"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 9l-7 7-7-7"
                                            ></path>
                                        </svg>
                                    </button>

                                    <!-- Answer panel -->
                                    <div
                                        v-show="openIndex === index"
                                        class="px-6 pb-5"
                                    >
                                        <div
                                            class="border-t border-[#2B1105]/10 pt-2"
                                        >
                                            <p
                                                class="mt-4 font-montaga text-lg leading-relaxed text-[#2B1105]/70"
                                                v-html="faq.answer"
                                            >

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Back to home link -->
                            <div class="mt-12 text-center lg:text-left">
                                <a
                                    href="/"
                                    class="inline-flex items-center gap-2 font-montaga text-[#2B1105] transition-colors hover:text-[#2B1105]/70"
                                >
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                        ></path>
                                    </svg>
                                    Back to home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Site footer -->
        <!--         <Footer year="2025" />-->
    </div>
</template>
