<template>
    <div class="mt-8" id="trade_terms">
        <div v-for="i in [currentIndex]" :key="i">
            <p class="font-sansBold text-2xl">{{ currentIndex + 1 }} / {{ slides.length }}. {{ currentSlide.title }}</p>
            <p v-html="currentSlide.content" class="mt-4"></p>
        </div>
        <div class="slide-nav mb-4 flex justify-between">
            <a class="prev button bg-black" @click.prevent="prev" href="#" v-if="currentIndex != 0">&larr; Previous</a>
            <a class="next self-end button bg-black" @click.prevent="next" href="#" v-if="currentIndex < this.slides.length-1">Next &rarr;</a>
        </div>

        <div class="form-group" v-if="currentIndex == this.slides.length-1">
            <label class="large-checkbox">
                <input type="checkbox" name="read_terms" v-model="$parent.terms" />
                <span class="text-2xl">I have read and agree with the Terms and Conditions</span>
                </label>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            slides: [
                {
                    title: "Application",
                    content: `
                        <ul class="list-disc pl-4">
                            <li>Applications are reviewed by our management team and dietitians.</li>
                            <li>It will be expected of each trader to acquaint themselves with the basic guidelines of the Banting, keto or LCHF lifestyle. Do NOT apply if you do not know what the Banting and Keto lifestyles imply.</li>
                            <li>All applications are considered in the light of the following factors:</li>
                            <li>How sellable the product is to our visitors</li>
                            <li>Is it Banting and keto friendly</li>
                            <li>To what extent does it overlap and impact other stallholders</li>
                            <li>You will be informed via e-mail if your application was successful or not.</li>
                        </ul>
                    `
                },
                {
                    title: "Bookings/Payment",
                    content: `
                        <ul class="list-disc pl-4">
                            <li>The application form is completed only once, you do not have to complete a new form for every market.</li>
                            <li>Additions and alterations to your product range MUST be approved by management.</li>
                            <li>When you receive an acceptance e-mail, your booking is only secured on payment of required stall fee.</li>
                            <li>Stall fees must be paid in advance via electronic transfer, not later than the Monday preceding the market.</li>
                            <li>Cash payments on market day must be approved by management at least a week before the market date. An additional admin fee of R30 will be charged on ALL cash payments.</li>
                            <li>Once you have been accepted, you have been approved permanently and are expected to attend both markets every month.</li>
                        </ul>
                    `
                },
                {
                    title: "Fees",
                    content: `
                        <ul class="list-disc pl-4">
                            <li>The cost of a stall is as follows:<br>
                                <p class="font-sansBold">3x2.5m stand</p>
                                <p>R300 per Saturday, add R30 for cash payments on the day of the market.</p>
                                <hr class="my-4">
                                <p class="font-sansBold">3x2.5m stand + electricity</p>
                                <p>R380 per Saturday, add R30 for cash payments on the day of the market. Please bring own extension cord. What type of appliance will you be using?</p>
                            </li>
                            <li>Fees go towards costs of venue rent, administration, marketing, salaries for workers to set-up on day, security, music entertainment and development of the market.</li>
                        </ul>
                    `
                },
                {
                    title: "Trading time/Setup regulations",
                    content: `
                        <ul class="list-disc pl-4">
                            <li>Market trading hours are from <strong>9am to 2pm</strong>.</li>
                            <li>Set up from 6am until 8:15am.</li>
                            <li>Vehicles may enter the market area and unload directly at your stall area after which the vehicle <strong>must then be moved to the designated parking area</strong>.</li>
                            <li>No entry after <strong>8:15am</strong> for traders’ vehicles to offload at the market.</li>
                            <li>Vehicle must be unloaded and moved to designated trader parking area before <strong>8:15am</strong>.</li>
                            <li>Traders arriving after 8:15am must park in the parking area and convey all the contents of their stalls on foot. You will not be allowed to unload directly at your stall.</li>
                            <li>No cars allowed behind or near your stall. The market and surrounding area is to be kept car-free to ensure space for the clients.</li>
                            <li>Traders who do not adhere to this rule, will receive a warning. A second warning at the next market, can result in losing your place at the market and not be allowed back at the market.</li>
                            <li>Your stall must be fully set-up by <strong>8:45am</strong>. Be prepared for the early-bird clients even as early as 8am.</li>
                            <li>Packing up of stalls is not permitted before <strong>2pm</strong>. All stalls <strong>must remain until closing time</strong>. Stalls must be kept neat and manned at all times</li>
                            <li>If you are sold out before 2pm, put up a SOLD OUT sign and leave your table dressed up.</li>
                            <li>No cars will be allowed to enter the market area before 2pm.</li>
                            <li>Traders shall leave the area at the end of the market the way it was found. Pick up rubbish, waste, packaging, used serviettes, paper, etc surrounding your stall. You are welcome to use the allocated rubbish bins provided by management.</li>
                        </ul>
                    `
                },
                {
                    title: "Your stall",
                    content: `
                        <ul class="list-disc pl-4">
                            <li>The venue layout will be sent to you a few days before the market. Your stall allocation will be clearly marked.</li>
                            <li>Spaces are allocated at the sole discretion of the market management and will always be done to best fit the layout, look and feel of the market as a whole. As the market constantly grows, it can sometimes result in a change of your allocated spot. Please do not request shade or a specific space.</li>
                            <li>Stallholders shall bring own tables, chairs, gazebos, tablecloths, extension cords, etc. Tables and chairs are NOT available to rent. As we are an indoor market, gazebo's are not compulsory. You are welcome to use a gazebo, though.</li>
                            <li>Table cloths must cover the <strong>full front of the table</strong>. Put boxes and packaging material under the table. Stall must be kept in a clean and tidy condition throughout the market.</li>
                            <li>Stallholders may display their products any way they choose, but shall not place goods and gazebos outside their designated areas.</li>
                            <li>In the interest of keeping a high standard at our market, <strong>the styling and display of your stall at the market is vital.</strong> An eye-catching, professional and appealing set-up will draw customers to your stall. Display CLEARLY your stall name and what you sell. Price <strong>MUST</strong> be displayed.</li>
                            <li>Take extra care when using gas to ensure safety of all. Portable fire extinguishers are required. NO open fires are allowed.</li>
                            <li>It is advisable to obtain alternative ways, other than cash, to collect payment from customers. Sales may increase if cash is not the only alternative. (Credit card machines/Snapscan/Zapper, etc). All these methods are relatively easy to obtain. Yoco and iKhoka credit card machines charge a small percentage fee per transaction and require no monthly fee.</li>
                        </ul>
                    `
                },
                {
                    title: "Public liability insurance",
                    content: `
                        <ul class="list-disc pl-4">
                            <li>It is each trader’s own responsibility to trade legally and safely at all times.</li>
                            <li>Damage and/or injury caused by traders’ products or stall is own responsibility and we thus advise that traders have their own public liability insurance.</li>
                            <li>The Real Food Market management and Brooklyn Mall employees are not responsible for injury or accident caused by your product or exhibit, damage to or theft of your stock/property whilst you are attending our market.</li>
                            <li>The trader shall indemnify the market management and Brooklyn Mall from and against any claims, demands, actions, debts, liabilities and attorney’s fees arising out of, claimed on account of, or in any manner predicated upon loss or damage to the property or the injuries or the death of any and all persons whatsoever, in any manner caused or contributed to by the trader or the trader’s employees while in, upon or about the property where in the stall is located, or while going to or departing from the same and to indemnify the market management from and or any account of damages of any kind which they may be suffered as the result of the acts of any of the market contractors, agents, or employees in or about the property the market is at.</li>
                        </ul>
                    `
                },
                {
                    title: "Marketing",
                    content: `
                        <ul class="list-disc pl-4">
                            <li>As with any event, we cannot guarantee visitor numbers but we will do our utmost to ensure that you have a successful market. Bad weather, load shedding or other interruptions is out of our control.</li>
                            <li>We do extensive online marketing, advertising boards and banners are put up every week before the market and sometimes advertise in the printed media.</li>
                            <li>We love to share pictures of the market and our traders on our social media pages, but please note that we only share quality pictures that is in line with our look and feel.</li>
                            <li>You are <strong>required</strong> to like all our social media pages (Facebook, Instagram &amp; Twitter) and undertake to like and share our posts on a regular basis.</li>
                            <li>Instagram is the social media platform that became extremely popular. Do your business a favour and sign up.</li>
                            <li>You agree that we can take photos of your products/stall and that these photos can be shared on our social media pages.</li>
                        </ul>
                    `
                },
                {
                    title: "Cancellation",
                    content: `
                        <ul class="list-disc pl-4">
                            <li>The market will always trade in all weather conditions. Should the market be cancelled in the event of <strong>extreme</strong> weather conditions, stallholders will receive a 50% credit that will be carried over to the next market date (only carried over once, if this market date not attended credit will be forfeited).</li>
                            <li>Stall fees are non-refundable if cancelled at late notice, 5 days prior to market or without a valid reason.</li>
                            <li>If you are unable to make it on market day, please let us know <strong>via telephone call</strong> as early as possible in the morning so that we can fill the space (open stall spaces look unprofessional and negative impact on market).</li>
                            <li>If you have not arrived to trade and have also not contacted us to inform what has happened we will assume cancellation and you will not be able to apply again.</li>
                        </ul>
                    `
                }
            ],
            currentIndex: 0
        };
    },

    mounted() {
        currentIndex: 0
    },

    methods: {
        next: function() {
            document.querySelector('#trade_terms').scrollIntoView();
            this.currentIndex += 1;
        },
        prev: function() {
            document.querySelector('#trade_terms').scrollIntoView();
            this.currentIndex -= 1;
        }
    },

    computed: {
        currentSlide: function() {
            return this.slides[Math.abs(this.currentIndex) % this.slides.length];
        }
    }
};
</script>