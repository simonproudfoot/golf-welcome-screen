<div id="progressBar" v-show="stepInner !== 0" class="mb-5" style="max-width: 500px; margin: auto">
    <vm-progress :percentage="percentageDone" text-inside track-color="#d9d9d9" stroke-linecap="round" stroke-color="#715df5"></vm-progress>
</div>
<div id="theForm" class="theForm" light>
    <div v-for="(question, key, index) in questions" :key="key">
        <form v-on:submit.prevent v-if="key == 'address' && stepInner == index" :rules="questions[key].length == 0 ? isValid = false : isValid = true ">
            <h4 class="text-center mb-4 sizeMe">Check which broadband is best for you</h4>

            <div class="formInner">
                <div class="formSectionInner form-group">
                    <div class="row align-items-center">
                        <div class="col-12 mb-2">
                            <h2>Please enter your Postcode</h2>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" v-model="searchPostcode" ref="postcodeField" class="cborder-primary form-control addressLookup" placeholder="Enter Postcode here" @change="requestAddress(key)" />
                        </div>
                        <div class="col-sm-6 mt-2 mt-sm-0">
                            <button class="btn btn-primary btn-block" @click="requestAddress(key)">Find My Address ></button>
                        </div>
                        <div v-show="addressList.length" class="col-md-12 mt-4">
                            <p class="text-secondary">Please select your address from the list below</p>
                            <select id="addressList" class="form-control" v-model="questions['address']">
                                <option value>Select your address</option>
                                <option v-for="(address, key) in addressList" :value="address" :key="key">
                                    {{address.line_1}}, {{address.post_town}}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <button v-show="addressList.length" class=" btn btn-secondary btn-large btn-block" @click.stop.prevent="questions[key].length == 0 ? vWarning() : stepInner++">
                    <span class="h1 font-weight-bold">Continue ></span>
                </button>
            </div>
        </form>
        <form v-on:submit.prevent v-show="key == 'currentProvider' && stepInner == index" :rules="questions[key] ? isValid = false : isValid = true ">
            <h2 class="text-center">Who is your current broadband provider?</h2>
            <p class="mb-5 text-center">If you don't have one yet, just select 'None'</p>
            <div class="formInner">
                <div class="formSectionInner form-group">
                    <div class="row align-items-center">
                        <div class="col">
                            <button @click="questions[key] = provider" v-for="(provider, index) in providers" :key="index" :class="questions[key] == provider ? 'btn-secondary' : 'btn-primary'" class="btn btn-block btn-primary">
                                {{provider}}
                            </button>
                        </div>
                    </div>
                </div>
                <button class=" btn btn-secondary btn-large btn-block" @click.stop.prevent="questions[key].length == 0 ? vWarning() : stepInner++">
                    <span class="h1 font-weight-bold">Continue ></span>
                </button>
            </div>
        </form>
        <form v-on:submit.prevent v-show="key == 'speed' && stepInner == index" :rules="questions[key] ? isValid = false : isValid = true ">
            <h2 class="text-center mb-5">What broadband speed do you require?</h2>
            <div class="formInner">
                <div class="formSectionInner form-group">
                    <div class="row align-items-center">
                        <div class="col">
                            <button @click="questions[key] = speed" v-for="(speed, index) in speeds" :key="index" :class="questions[key] == speed ? 'btn-secondary' : 'btn-primary'" class="btn btn-block btn-primary">
                                {{speed}}
                            </button>
                        </div>
                    </div>
                </div>
                <button class=" btn btn-secondary btn-large btn-block" @click.stop.prevent="questions[key].length == 0 ? vWarning() : stepInner++">
                    <span class="h1 font-weight-bold">Continue ></span>
                </button>
            </div>
        </form>
        <!-- name -->
        <form v-on:submit.prevent v-show="key == 'type' && stepInner == index" :rules="questions[key] ? isValid = false : isValid = true ">
            <h2 class="text-center mb-5">What broadband speed do you require?</h2>
            <div class="formInner">
                <div class="form-group">
                    <div class="row align-items-center">
                        <div class="col">
                            <button @click="questions[key] = type" v-for="(type, index) in types" :key="index" :class="questions[key] == type ? 'btn-secondary' : 'btn-primary'" class="btn btn-block btn-primary">
                                {{type}}
                            </button>
                        </div>
                    </div>
                </div>
                <button class="btn btn-secondary btn-large btn-block" @click.stop.prevent="questions[key].length == 0 ? vWarning() : stepInner++">
                    <span class="h1 font-weight-bold">Continue ></span>
                </button>
            </div>
        </form>
        <form v-on:submit.prevent v-show="key == 'aboutYou' && stepInner == index" :rules="questions[key] ? isValid = false : isValid = true ">
            <div class="mt-5 mb-5">
                <h2 class="text-center mb-5">Your name</h2>
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-8">
                        <label>Title*</label>
                        <select class="form-control mb-4" v-model="questions['aboutYou']['title']">
                            <option value="">Please select</option>
                            <option v-for="(title, key) in titles"  :value="title" :key="key">
                                {{title}}
                            </option>
                        </select>
                        <label>First name*</label>
                        <input type="text"  class="form-control mb-4 full-width" v-model="questions['aboutYou']['first_name']"  placeholder="Enter your first name here">
                        <label>Last name*</label>
                        <input type="text"  class="form-control mb-4 full-width" v-model="questions['aboutYou']['last_name']" placeholder="Enter your last name here">
                        <button class=" btn btn-secondary btn-large btn-block" @click.stop.prevent="!questions['aboutYou']['title'] || !questions['aboutYou']['first_name'] || !questions['aboutYou']['last_name'] ? vWarning() : stepInner++">
                            <span class="h1 font-weight-bold">Continue ></span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div v-show="key == 'contactDetails' && stepInner == index" :rules="questions[key] ? isValid = false : isValid = true ">
            <div class="container">
                <form v-on:submit.prevent>
                    <div class="mt-5">
                        <h2 class="text-center mb-5">Contact details</h2>
                        <div class="row justify-content-md-center">
                            <div class="col-12 col-md-8">
                                <label>Phone*</label>
                                <input id="telephoneField" type="tel" required class="form-control mb-4 full-width" v-model="questions['contactDetails']['phone']" placeholder="Enter your telephone number here">
                                <label>Email*</label>
                                <input id="email" type="email" required class="form-control mb-4 full-width" v-model="questions['contactDetails']['email']" placeholder="Enter your email here">
                                <div class="text-center">
                                    <p class="text-secondary mt--4">
                                        <?php the_field('privacy_policy_info'); ?>
                                    </p>
                                    <button :disabled="sending" class="btn btn-secondary btn-large text-white btn-large btn-block" style="max-width: 400px; margin: 0 auto" @click.stop.prevent="submit">
                                        <span v-if="sending" class="display-4 font-weight-bold">Get a Quote ></span>
                                        <span v-else class="1 font-weight-bold" style="font-size: 2em; ">Get a Quote ></span>
                                    </button>
                                    <p class="text-success mt-2">
                                        <svg style="width:24px;height:24px; display: inline-block; vertical-align: text-bottom;" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                                        </svg> SLL Secure</p>
                                    <div class="mt-5" style="color: gray">
                                        <p>
                                            <?php the_field('last_paragraph'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>