<template>
<form id="application-form" method="POST" action="applyForm">
        <div class="form-group">
            <input type="text" id="stall_name" name="stall_name" placeholder="Stall/business name" v-model="form.stall_name" required >
            <label for="stall_name">Stall/Business name</label>
        </div>
        <div class="form-group">
            <input type="text" id="name_surname" name="name_surname" placeholder="Your name & surname" v-model="form.name_surname" required >
            <label for="name_surname">Name & surname</label>
        </div>
        <div class="form-group">
            <input type="text" id="car_reg" name="car_reg" placeholder="Car registraton nr" v-model="form.car_reg" required >
            <label for="car_reg">Car registration nr</label>
        </div>
        <div class="form-group">
            <input type="text" id="phone" name="phone" placeholder="Phone" v-model="form.phone" required >
            <label for="phone">Phone</label>
        </div>
        <div class="form-group">
            <input type="text" id="email" name="email" placeholder="Email" v-model="form.email" required >
            <label for="email">Email</label>
        </div>
        <div class="form-group">
            <textarea id="address" name="address" placeholder="Address" v-model="form.address" required ></textarea>
            <label for="address">Address</label>
        </div>
        <div class="form-group">
            <input type="url" id="website" name="website" placeholder="https://www.example.com/" v-model="form.website">
            <label for="website">Website</label>
        </div>
        <div class="form-group">
            <input type="url" id="facebook_page" name="facebook_page" placeholder="https://www.faceboom.com/your-page-name" v-model="form.facebook">
            <label for="facebook_page">Facebook page</label>
        </div>
        <div class="form-group">
            <input type="url" id="instagram_page" name="instagram_page" placeholder="https://www.instagram.com/your-profile-name/" v-model="form.instagram">
            <label for="instagram_page">Instagram page</label>
        </div>
        <div class="stripe bg-black mx-auto my-4"></div>
        <h2>Product information</h2>
        <p>Do you, the applicant, produce your products?</p>
        <div class="form-group">
            <input type="radio" id="producer" name="producer" value="Yes" required v-model="form.produce_self">
            <label for="producer">Yes</label>
        </div>
        <div class="form-group">
            <input type="radio" id="producer" name="producer" value="No" required v-model="form.produce_self">
            <label for="producer">No</label>
        </div>
        <div class="form-group">
            <p>List all the products that you would like to sell at the market including your ingredients. Please give as much information as possible. Once application submitted you must please also e-mail pictures of all your products to <email /></p>
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Products</th>
                        <th>Ingredients</th>
                    </tr>
                </thead>
                <tbody id="parent">
                    <tr v-for="(product, index) in form.products" :key="index">
                        <td class="products">
                            <input class="products-input" type="text" name="products" v-model="product.name" placeholder="Product" required>
                        </td>
                        <td class="products">
                            <textarea class="products-input" v-model="product.ingredients" name="ingredients" placeholder="Ingredients" required></textarea>
                        </td>
                        <button @click="deleteItem(index)">&#215;</button>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <span id="add-product" class="button-wrap left-align">
                    <span class="button-background green-border"></span>
                    <span class="button bg-dg" @click="addItem">+ Add</span>
                </span>
            </div>
        </div>

        <div class="stripe bg-black mx-auto my-4"></div>
        <h2>Stand options</h2>
        <div class="form-group">
            <input type="radio" id="stand-3m" name="stand_3m" value="3x3 stand" v-model="form.stand_type">
            <label for="stand-3m">3x3m stand</label>
        </div>

        <div class="form-group">
            <input type="radio" id="stand-3m-elec" name="stand_3m_elec" value="stand with electricity" v-model="form.stand_type">
            <label for="stand-3m-elec">3x3m stand + electricity</label>
        </div>

        <div class="form-group" id="appliance-type" v-if="form.stand_type == 'stand with electricity'">
            <label for="appliance">What type of appliance(s) do you use?</label>
            <input type="text" id="appliance" name="appliance" placeholder="Eg. microwave" v-model="form.appliances">
        </div>

        <div class="form-group">
            <input type="checkbox" id="gas" name="gas" v-model="form.use_gas">
            <label for="gas">I use gas. I have read and understand the regulations and will adhere to it.</label>
            <p class="gas-warning">If you use gas, a fire extinguisher is compulsory.</p>
        </div>

        <div class="form-group">
            <label for="social-media">Have you liked/are you following our social media pages?</label>
            <div class="form-group">
                <input type="radio" name="social_yes" value="Yes" v-model="form.social_media">
                <label for="social_yes">Yes</label>
            </div>
            <div class="form-group">
                <input type="radio" name="social_no" value="No" v-model="form.social_media">
                <label for="ocial_no">No</label>
            </div>
        </div>
        <div class="form-group">
            <p class="body-text">By submitting this form I agree to the Terms and Conditions.</p>
            <button type="submit" value="submit" class="form-submit-button button-wrap left-align">
                <span class="button-background green-border"></span>
                <span class="button-text green">Submit</span>
            </button>
        </div>
    </form>

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
            }
        }

    }
</script>