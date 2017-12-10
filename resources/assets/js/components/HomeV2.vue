<template>
    <section>
        <div class="container">
            <transition name="flipX" mode="out-in">
                <template>
                    <div class="row flex-center full-height" v-if="formActive" key="form">
                        <div class="col-sm-8 col-sm-offset-2">
                            <transition name="fade-out-up" mode="out-in">
                                <template>
                                    <div class="questions" v-if="currentQ === 'name'" key="name">
                                        <h2 class="ask">Hi, what's your name?</h2>

                                        <input type="text" v-model="formData.name" autofocus @keyup.enter="proceed('age', 10)">

                                        <transition name="light-speed-in">
                                            <div v-if="formData.name !== null">
                                                <button class="btn btn-lg btn-primary" @click="proceed('age', 10)">OK</button> or press <b>ENTER</b>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'age'" key="age">
                                        <h2 class="ask">Hi <b class="text-primary">{{ formData.name }}</b>, what's your age?</h2>

                                         <select v-model="formData.age" ref="age" @keyup.enter="proceed('weight', 14)">
                                            <option :value="n + 17" v-for="n in 33">{{ n + 17 }}</option>   
                                        </select>

                                        <span class="afterSelect"></span>

                                        <transition name="light-speed-in">
                                            <div v-if="formData.age !== null">
                                                <button class="btn btn-lg btn-primary" @click="proceed('weight', 14)">OK</button> or press <b>ENTER</b>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'weight'" key="weight">
                                        <h2 class="ask">What is your weight?</h2>

                                        <p class="subTitle">(pounds) Choose the closest value to your actual weight.</p>

                                         <select v-model="formData.weight" ref="weight" @keyup.enter="proceed('height', 18)">
                                                <option value="60">60</option>
                                                <option value="65">65</option>
                                                <option value="70">70</option>
                                                <option value="75">75</option>
                                                <option value="80">80</option>
                                                <option value="85">85</option>
                                                <option value="90">90</option>
                                                <option value="95">95</option>
                                                <option value="100">100</option>
                                                <option value="105">105</option>
                                                <option value="110">110</option>
                                                <option value="115">115</option>
                                                <option value="120">120</option>
                                                <option value="125">125</option>
                                                <option value="130">130</option>
                                                <option value="135">135</option>
                                                <option value="140">140</option>
                                                <option value="145">145</option>
                                                <option value="150">150</option>
                                                <option value="155">155</option>
                                                <option value="160">160</option>
                                                <option value="165">165</option>
                                                <option value="170">170</option>
                                                <option value="175">175</option>
                                                <option value="180">180</option>
                                                <option value="185">185</option>
                                                <option value="190">190</option>
                                                <option value="195">195</option>
                                                <option value="200">200</option>
                                                <option value="205">205</option>
                                                <option value="210">210</option>
                                                <option value="215">215</option>
                                                <option value="220">220</option>
                                                <option value="225">225</option>
                                                <option value="230">230</option>
                                                <option value="235">235</option>
                                                <option value="240">240</option>
                                                <option value="245">245</option>
                                                <option value="250">250</option>
                                                <option value="255">255</option>
                                                <option value="260">260</option>
                                                <option value="265">265</option>
                                                <option value="270">270</option>
                                                <option value="275">275</option>
                                                <option value="280">280</option>
                                                <option value="285">285</option>
                                                <option value="290">290</option>
                                                <option value="295">295</option>
                                                <option value="300">300</option>
                                                <option value="305">305</option>
                                                <option value="310">310</option>
                                                <option value="315">315</option>
                                                <option value="320">320</option>
                                                <option value="325">325</option>
                                                <option value="330">330</option>
                                                <option value="335">335</option>
                                                <option value="340">340</option>
                                                <option value="345">345</option>
                                                <option value="350">350</option>
                                                <option value="355">355</option>
                                                <option value="360">360</option>
                                                <option value="365">365</option>
                                                <option value="370">370</option>
                                                <option value="375">375</option>
                                                <option value="380">380</option>
                                                <option value="385">385</option>
                                                <option value="390">390</option>
                                                <option value="395">395</option>
                                                <option value="400">400</option>  
                                        </select>

                                        <span class="afterSelect"></span>

                                        <transition name="light-speed-in">
                                            <div v-if="formData.weight !== null">
                                                <button class="btn btn-lg btn-primary" @click="proceed('height', 18)">OK</button> or press <b>ENTER</b>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'height'" key="height">
                                        <h2 class="ask">What is your height?</h2>

                                        <select v-model="formData.height" ref="height" @keyup.enter="proceed('drink', 22)">
                                            <option value="4.1">4’1”</option>
                                            <option value="4.2">4’2”</option>
                                            <option value="4.3">4’3”</option>
                                            <option value="4.4">4’4”</option>
                                            <option value="4.5">4’5”</option>
                                            <option value="4.6">4’6”</option>
                                            <option value="4.7">4’7”</option>
                                            <option value="4.8">4’8”</option>
                                            <option value="4.9">4’9”</option>
                                            <option value="4.10">4’10”</option>
                                            <option value="4.11">4’11”</option>
                                            <option value="5.0">5’0”</option>
                                            <option value="5.1">5’1”</option>
                                            <option value="5.2">5’2”</option>
                                            <option value="5.3">5’3”</option>
                                            <option value="5.4">5’4”</option>
                                            <option value="5.5">5’5”</option>
                                            <option value="5.6">5’6”</option>
                                            <option value="5.7">5’7”</option>
                                            <option value="5.8">5’8”</option>
                                            <option value="5.9">5’9”</option>
                                            <option value="5.10">5’10”</option>
                                            <option value="5.11">5’11”</option>
                                            <option value="6.0">6’0”</option>
                                            <option value="6.1">6’1”</option>
                                            <option value="6.2">6’2”</option>
                                            <option value="6.3">6’3”</option>
                                            <option value="6.4">6’4”</option>
                                            <option value="6.5">6’5”</option>
                                            <option value="6.6">6’6”</option>
                                            <option value="6.7">6’7”</option>
                                            <option value="6.8">6’8”</option>
                                            <option value="6.9">6’9”</option>
                                            <option value="6.10">6’10”</option>
                                            <option value="6.11">6’11”</option>
                                            <option value="7.0">7’0”</option>
                                            <option value="7.1">7’1”</option>
                                            <option value="7.2">7’2”</option>
                                            <option value="7.3">7’3”</option>
                                            <option value="7.4">7’4”</option>
                                            <option value="7.5">7’5”</option>
                                            <option value="7.6">7’6”</option>
                                            <option value="7.7">7’7”</option>
                                            <option value="7.8">7’8”</option>
                                            <option value="7.9">7’9”</option>
                                            <option value="7.10">7’10”</option>
                                            <option value="7.11">7’11”</option>
                                        </select>

                                        <span class="afterSelect"></span>

                                        <transition name="light-speed-in">
                                            <div v-if="formData.height !== null">
                                                <button class="btn btn-lg btn-primary" @click="proceed('drink', 22)">OK</button> or press <b>ENTER</b>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'drink'" key="drink">
                                        <h2 class="ask smaller">Do you drink more than 21 drinks per week?</h2>

                                        <p class="subTitle">(one beer, one glass of wine or an ounce of liquor are all considered one drink)</p>

                                        <div class="checkMark">
                                            <a @click.prevent="formData.drink = 'yes'" :class="{ 'selected animated rubberBand': formData.drink == 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="formData.drink = 'no'" :class="{ 'selected animated rubberBand': formData.drink == 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>

                                        <transition name="light-speed-in">
                                            <div v-if="formData.drink !== null">
                                                <button class="btn btn-lg btn-primary" @click="proceed('violation', 25)">OK</button>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'violation'" key="violation">
                                        <h2 class="ask smaller">Have you had more than one moving violation while driving in the past 12 months?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="formData.violation = 'yes'" :class="{ 'selected animated rubberBand': formData.violation == 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="formData.violation = 'no'" :class="{ 'selected animated rubberBand': formData.violation == 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>

                                        <transition name="light-speed-in">
                                            <div v-if="formData.violation !== null">
                                                <button class="btn btn-lg btn-primary" @click="currentQ = 'work'">OK</button>
                                            </div>
                                        </transition>
                                    </div>
                                </template>
                            </transition>
                        </div>
                    </div>

                    <div class="row flex-center full-height" v-else key="landing">
                        <div class="col-sm-12 text-center">
                            <img :src="logo" class="logo img-responsive flipInX animated">

                            <h1 class="animated zoomIn mainTitle">Lifesprung</h1>

                            <p class="animated fadeInDown subTitle">Find out if you are likely to qualify <br>for the lowest life insurance rates by answering the following questions:</p>

                            <button class="btn btn-lg btn-primary" @click="activateForm">Start Here</button>    
                        </div>
                    </div>
                </template>
            </transition>
        </div>

        <div class="header animated fadeIn" v-if="formActive">
            <img :src="logo" class="logo img-responsive"> <h1 class="mainTitle">Lifesprung</h1>
        </div>

        <div class="footer animated slideInUp clearfix" v-if="formActive">
            <div class="progress pull-left">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100" :style="{ width: progress + '%' }">
                </div>
            </div>
            <p class="pull-left">{{ progress }}% completed</p>
            <div class="pull-right">
                <button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></button>
                <button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                formActive: false,
                currentQ: 'name',
                progress: 0,
                formData: {
                    name: null,
                    age: null,
                    weight: null,
                    height: null,
                    drink: null,
                    violation: null,
                    work: null,
                }
            }
        },

        props: {
            logo: null
        },

        methods: {
            activateForm() {
                this.formActive = true;
            },

            proceed(elem, percentage) {
                this.currentQ = elem;

                this.progress = percentage;
            }
        }
    }
</script>