<template>
    <div class="form-container">
        <form id="application-form" method="POST" action="apply" @change="form.errors.clear($event.target.name)" @submit.prevent="onSubmit">
            <div class="form-group mb-8">
                <span class="required text-warning">*</span> indicates required fields
            </div>
            <div class="form-group mb-4">
                <input
                    type="text"
                    id="stall_name"
                    name="stall_name"
                    placeholder="Stall/business name"
                    v-model="form.stall_name"
                    v-bind:class="{ errorBorder: form.errors.has('stall_name') }"
                    @keydown="form.errors.clear('stall_name')"
                    class="border-b border-black mb-1">
                <label for="stall_name"
                    class="font-sansBold">
                    Stall/Business name
                    <span class="required text-warning">*</span>
                </label>
            </div>
            <div class="form-group mb-4">
                <input
                    type="text"
                    id="name_surname"
                    name="name_surname"
                    placeholder="Your name & surname"
                    v-model="form.name_surname"
                    v-bind:class="{ errorBorder: form.errors.has('name_surname') }"
                    @keydown="form.errors.clear('name_surname')"
                    class="border-b border-black mb-1" >
                <label for="name_surname" class="font-sansBold">
                    Name & surname
                    <span class="required text-warning">*</span>
                </label>
            </div>
            <div class="form-group mb-4">
                <input
                    type="text"
                    id="car_reg"
                    name="car_reg"
                    placeholder="Car registraton nr"
                    v-model="form.car_reg"
                    v-bind:class="{ errorBorder: form.errors.has('car_reg') }"
                    @keydown="form.errors.clear('car_reg')"
                    class="border-b border-black mb-1" >
                <label for="car_reg" class="font-sansBold">
                    Car registration nr
                    <span class="required text-warning">*</span>
                </label>
            </div>
            <div class="form-group mb-4">
                <input
                    type="text" id="phone"
                    name="phone"
                    placeholder="Phone"
                    v-model="form.phone"
                    v-bind:class="{ errorBorder: form.errors.has('phone') }"
                    @keydown="form.errors.clear('phone')"
                    class="border-b border-black mb-1" >
                <label for="phone" class="font-sansBold">
                    Phone
                    <span class="required text-warning">*</span>
                </label>
            </div>
            <div class="form-group mb-4">
                <input
                    type="text"
                    id="email"
                    name="email"
                    placeholder="Email"
                    v-model="form.email"
                    v-bind:class="{ errorBorder: form.errors.has('email') }"
                    @keydown="form.errors.clear('email')"
                    class="border-b border-black mb-1" >
                <label for="email" class="font-sansBold">
                    Email
                    <span class="required text-warning">*</span>
                </label>
            </div>
            <div class="form-group mb-4">
                <textarea
                    id="address"
                    name="address"
                    placeholder="Address"
                    v-model="form.address"
                    v-bind:class="{ errorBorder: form.errors.has('address') }"
                    @keydown="form.errors.clear('address')"
                    class="border-b border-black mb-1" ></textarea>
                <label for="address" class="font-sansBold">
                    Your address
                    <span class="required text-warning">*</span>
                </label>
            </div>
            <div class="form-group mb-4">
                <input
                    type="url"
                    id="website"
                    name="website"
                    placeholder="https://example.com/"
                    v-model="form.website"
                    @keydown="form.errors.clear('website')"
                    class="border-b border-black mb-1" >
                <label for="website" class="font-sansBold">
                    Website
                </label>
            </div>
            <div class="form-group mb-4">
                <input
                    type="url"
                    id="facebook_page"
                    name="facebook_page"
                    placeholder="https://faceboom.com/your-page-name"
                    v-model="form.facebook"
                    @keydown="form.errors.clear('facebook')"
                    class="border-b border-black mb-1" >
                <label for="facebook_page" class="font-sansBold">
                    Facebook page
                </label>
            </div>
            <div class="form-group mb-4">
                <input
                    type="url" id="instagram_page"
                    name="instagram_page"
                    placeholder="https://instagram.com/your-profile-name/"
                    v-model="form.instagram"
                    @keydown="form.errors.clear('instagram')"
                    class="border-b border-black mb-1" >
                <label for="instagram_page" class="font-sansBold">
                    Instagram page
                </label>
            </div>

            <h2 class="font-sansBold text-3xl mt-8 leading-none">Product information</h2>
            <p class="mt-2">
                Do you, the applicant, produce your products?
                <span class="required text-warning">*</span>
            </p>
            <div class="form-group my-4">
                <input
                    type="radio"
                    id="producer"
                    name="produce_self"
                    value="Yes"
                    v-model="form.produce_self"
                    v-bind:class="{ errorBorder: form.errors.has('produce_self') }"
                    @keydown="form.errors.clear('produce_self')"
                    class="mr-2">
                <label for="producer">Yes</label>
            </div>
            <div class="form-group mb-4">
                <input
                    type="radio"
                    id="producer"
                    name="produce_self"
                    value="No"
                    v-model="form.produce_self"
                    v-bind:class="{ errorBorder: form.errors.has('produce_self') }"
                    @keydown="form.errors.clear('produce_self')"
                    class="mr-2">
                <label for="producer">No</label>
            </div>
            <div class="form-group mb-4">
                <p class="mb-8">List all the products that you would like to sell at the market including your ingredients. Please give as much information as possible. Once application submitted you must please also e-mail pictures of all your products to <email /></p>
                <p class="font-sansBold">My products</p>
                <table class="products-table">
                    <thead>
                        <tr>
                            <th>
                                Products
                                <span class="required text-warning">*</span>
                            </th>
                            <th>
                                Ingredients
                                <span class="required text-warning">*</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="parent">
                        <tr v-for="(product, index) in form.products" :key="index">
                            <td class="products">
                                <input
                                    class="border-b border-black mb-1"
                                    type="text"
                                    name="products"
                                    v-model="product.name"
                                    placeholder="E.g. coffee"
                                    v-bind:class="{ errorBorder: form.errors.has('products') }"
                                    @keydown="form.errors.clear('products')">
                            </td>
                            <td class="products">
                                <textarea
                                    class="border-b border-black mb-1"
                                    v-model="product.ingredients"
                                    name="products" placeholder="E.g. ground coffee beans"
                                    v-bind:class="{ errorBorder: form.errors.has('products') }"
                                    @keydown="form.errors.clear('products')"></textarea>
                            </td>
                            <button @click.prevent="deleteItem(index)" class="w-full text-center py-2 text-warning">&#215; Remove</button>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <span id="add-product" class="button-wrap left-align">
                        <span class="button-background green-border"></span>
                        <span class="button text-center cursor-pointer mt-4" @click="addItem">+ Add</span>
                    </span>
                </div>
            </div>

            <h2 class="font-sansBold text-3xl mt-8 leading-none">Stand options</h2>
            <div class="form-group my-8">
                <input
                    type="radio"
                    id="stand-3m"
                    name="stand_type"
                    value="3x3 stand"
                    v-model="form.stand_type"
                    v-bind:class="{ errorBorder: form.errors.has('stand_type') }"
                    @keydown="form.errors.clear('stand_type')">
                <label for="stand-3m" class="ml-2">3 &#215; 2.5m stand</label>
            </div>

            <div class="form-group mb-4">
                <input
                    type="radio"
                    id="stand-3m-elec"
                    name="stand_type"
                    value="stand with electricity"
                    v-model="form.stand_type"
                    v-bind:class="{ errorBorder: form.errors.has('stand_type') }"
                    @keydown="form.errors.clear('stand_type')">
                <label for="stand-3m-elec" class="ml-2">3 &#215; 2.5m stand + electricity</label>
            </div>

            <div class="form-group mb-4" id="appliance-type" v-if="form.stand_type == 'stand with electricity'">
                <label for="appliance">What type of appliance(s) do you use?</label>
                <input
                    type="text"
                    id="appliance"
                    name="appliance"
                    placeholder="Eg. microwave, kettle"
                    v-model="form.appliances"
                    @keydown="form.errors.clear('appliances')"
                    class="border-b border-black mb-1">
            </div>

            <div class="form-group mb-4">
                <input
                    type="checkbox"
                    id="gas"
                    name="gas"
                    v-model="form.use_gas"
                    @keydown="form.errors.clear('use_gas')">
                <label for="gas" class="ml-2">I use gas. </label>
                <p class="text-warning italic mt-2 text-xs">
                    I have read and understand the regulations and will adhere to it.
                    <br>If you use gas, a fire extinguisher is compulsory.
                    </p>
            </div>

            <div class="form-group mb-4">
                <label for="social-media" class="font-sansBold">Have you liked/are you following our social media pages?</label>
                <div class="form-group">
                    <input
                        type="radio"
                        name="social_media"
                        value="Yes"
                        v-model="form.social_media"
                        v-bind:class="{ errorBorder: form.errors.has('social_media') }"
                        @keydown="form.errors.clear('social_yes')">
                    <label for="social_media" class="ml-2">Yes</label>
                </div>
                <div class="form-group">
                    <input
                        type="radio"
                        name="social_media"
                        value="No"
                        v-model="form.social_media"
                        v-bind:class="{ errorBorder: form.errors.has('social_media') }"
                        @keydown="form.errors.clear('social_media')">
                    <label for="social_media" class="ml-2">No</label>
                </div>
            </div>
            <div class="form-group mb-4">
                <p class="body-text">By submitting this form I agree to the Terms and Conditions.</p>
                <p class="py-4 text-2xl error" v-if="form.errors.any()">
                    Oops! There were some issues with your submission. Please see errors below and scroll to the relevant fields highlighted in red to fix them.
                </p>
                <ul v-if="form.errors.any()">
                    <li
                        class="error"
                        v-if="form.errors.has('stall_name')"
                        v-text="form.errors.get('stall_name')">
                    </li>
                    <li
                        class="error"
                        v-if="form.errors.has('name_surname')"
                        v-text="form.errors.get('name_surname')">
                    </li>
                    <li
                        class="error"
                        v-if="form.errors.has('car_reg')"
                        v-text="form.errors.get('car_reg')">
                    </li>
                    <li
                        class="error"
                        v-if="form.errors.has('phone')"
                        v-text="form.errors.get('phone')">
                    </li>
                    <li
                        class="error"
                        v-if="form.errors.has('email')"
                        v-text="form.errors.get('email')">
                    </li>
                    <li
                        class="error"
                        v-if="form.errors.has('address')"
                        v-text="form.errors.get('address')">
                    </li>
                    <li
                        class="error"
                        v-if="form.errors.has('produce_self')"
                        v-text="form.errors.get('produce_self')">
                    </li>
                    <li
                        class="error"
                        v-if="form.errors.has('products')"
                        v-text="form.errors.get('products')">
                    </li>
                    <li
                        class="error"
                        v-if="form.errors.has('stand_type')"
                        v-text="form.errors.get('stand_type')">
                    </li>
                    <li
                        class="error"
                        v-if="form.errors.has('social_media')"
                        v-text="form.errors.get('social_media')">
                    </li>
                </ul>
                <button type="submit" value="submit" class="button text-center cursor-pointer mt-4" id="submit-btn">
                    Submit
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import Form from '../core/Form';
    export default {
        data() {
            return {
                form: new Form({
                    stall_name: '',
                    name_surname: '',
                    car_reg: '',
                    phone: '',
                    email: '',
                    address: '',
                    website: '',
                    facebook: '',
                    instagram: '',
                    produce_self: '',
                    products: [],
                    stand_type: '',
                    appliances: '',
                    use_gas: '',
                    social_media: ''
                })
            }
        },

        methods: {
            addItem: function() {
                this.form.products.push({name: '', ingredients: '' });
            },

            deleteItem: function(index) {
                this.form.products.splice(index, 1);
            },

            onSubmit() {
                const submitBtn = document.querySelector('#submit-btn');
                submitBtn.innerText = "Sending...";
                this.form.post('/apply').then(response => {
                    document.querySelector('.vendor-form-container').innerHTML = `
                        <div class="alert alert-success bg-dg p-2">
                            <p class="text-2xl font-sansBold text-white">${response[1]}</p>
                        </div>
                    `;
                    document.querySelector('.alert-success').scrollIntoView();
                }).catch(error => {
                    submitBtn.innerText = "Send";
                });
            }
        }

    }
</script>