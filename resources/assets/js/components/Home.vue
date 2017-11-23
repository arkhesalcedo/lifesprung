<template>
    <section class="front">
        <div class="container">
            <div class="full-height flex-center row" v-show="! formActive">
                <section class="col-sm-12 text-center">
                    <img :src="logo" class="logo">

                    <h1 class="title">
                        Lifesprung
                    </h1>

                    <p class="subtitle" v-if="summary">
                        <span v-if="qualified">It is very likely that you will qualify for low-cost life insurance.</span>
                        <span v-else>We need ask you more questions to evaluate your eligibility.</span>
                        <br><br>
                        Please call us at <i class="text-success"><b>555-555-5555</b></i>
                    </p>

                    <p class="subtitle" v-else>
                        Find out if you are likely to qualify <br>
                        for the lowest life insurance rates by answering the following questions:
                    </p>

                    <button @click="activateForm" class="btn btn-primary" v-show="! summary">Start Here</button>
                </section>
            </div>

            <div class="col-xs-12 col-md-8 col-md-offset-2" v-show="formActive">
                <form class="theForm" @submit.prevent="" autocomplete="off">
                    <div :class="[formSectionsClass.q1]" v-show="formSections.q1">
                        <div class="fs-fields fs-anim-upper">
                            <p class="subtitle">I am

                            <select v-model="formData.age" name="age">
                                <option :value="n + 17" v-for="n in 33">{{ n + 17 }}</option>   
                            </select><span class="afterSelect"></span>

                            years old and I weight about <select v-model="formData.weight" name="weight">
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
                            </select><span class="afterSelect"></span> pounds.</p>
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            <p class="subtitle">I am

                            <select v-model="formData.feet" name="feet">
                                <option :value="n + 3" v-for="n in 8">{{ n + 3 }}</option>   
                            </select><span class="afterSelect"></span> feet and

                            <select v-model="formData.inches" name="inches">
                                <option :value="n + 1" v-for="n in 10">{{ n + 1 }}</option>   
                            </select><span class="afterSelect"></span> inches tall.</p>

                            <p class="subtitle">I currently work

                            <select v-model="formData.work" name="work">
                                <option value="yes">more than</option>
                                <option value="no">less than</option> 
                                <option value="about">about</option> 
                            </select><span class="afterSelect"></span> thirty hours per week.</p>
                        </div>
                    </div>

                    <div :class="[formSectionsClass.q2]" v-show="formSections.q2">
                        <div class="fs-fields fs-anim-upper">
                            <p class="subtitle">I typically drink

                            <select v-model="formData.drink" name="drink">
                                <option value="yes">more</option>
                                <option value="no">less</option>
                            </select><span class="afterSelect"></span> than 21 drinks per week.</p>

                            <p class="subtitle">I

                            <select v-model="formData.violation" name="violation">
                                <option value="yes">had</option>
                                <option value="no">didn’t have</option> 
                            </select><span class="afterSelect"></span> more than one moving violation in the past 12 months.</p>
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            <p class="subtitle">Have you ever been diagnosed or treated for:</p>

                            <p class="options">
                                Cancer<br>
                                <span @click="toggleYesNo('cancer', 'yes')" :class="{ 'selected' : formData.cancer == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('cancer', 'no')" :class="{ 'selected' : formData.cancer == 'no'}">No</span>
                            </p>
                            <p class="options">
                                Diabetes<br>
                                <span @click="toggleYesNo('diabetes', 'yes')" :class="{ 'selected' : formData.diabetes == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('diabetes', 'no')" :class="{ 'selected' : formData.diabetes == 'no'}">No</span>
                            </p>
                            <p class="options">
                                Sclerosis<br>
                                <span @click="toggleYesNo('sclerosis', 'yes')" :class="{ 'selected' : formData.sclerosis == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('sclerosis', 'no')" :class="{ 'selected' : formData.sclerosis == 'no'}">No</span>
                            </p>
                        </div>
                    </div>

                    <div :class="[formSectionsClass.q3]" v-show="formSections.q3">
                        <div class="fs-fields fs-anim-upper">
                            <p class="subtitle">Have you ever been diagnosed or treated for:</p>

                            <p class="options">
                                Kidney Disease?<br>
                                <span @click="toggleYesNo('kidney', 'yes')" :class="{ 'selected' : formData.kidney == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('kidney', 'no')" :class="{ 'selected' : formData.kidney == 'no'}">No</span>
                            </p>
                            <p class="options">
                                Heart Disease?<br>
                                <span @click="toggleYesNo('heart', 'yes')" :class="{ 'selected' : formData.heart == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('heart', 'no')" :class="{ 'selected' : formData.heart == 'no'}">No</span>
                            </p>
                            <p class="options">
                                Liver Disease?<br>
                                <span @click="toggleYesNo('liver', 'yes')" :class="{ 'selected' : formData.liver == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('liver', 'no')" :class="{ 'selected' : formData.liver == 'no'}">No</span>
                            </p>
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            <p class="subtitle">Have 2 or more of your parents or siblings been diagnosed before the age of sixty with:</p>

                            <p class="options">
                                Stroke?<br>
                                <span @click="toggleYesNo('stroke', 'yes')" :class="{ 'selected' : formData.stroke == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('stroke', 'no')" :class="{ 'selected' : formData.stroke == 'no'}">No</span>
                            </p>
                            <p class="options">
                                Heart Disease?<br>
                                <span @click="toggleYesNo('heartR', 'yes')" :class="{ 'selected' : formData.heartR == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('heartR', 'no')" :class="{ 'selected' : formData.heartR == 'no'}">No</span>
                            </p>
                            <p class="options">
                                Cancer?<br>
                                <span @click="toggleYesNo('cancerR', 'yes')" :class="{ 'selected' : formData.cancerR == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('cancerR', 'no')" :class="{ 'selected' : formData.cancerR == 'no'}">No</span>
                            </p>
                        </div>
                    </div>

                    <div :class="[formSectionsClass.q4]" v-show="formSections.q4">
                        <div class="fs-fields fs-anim-upper">
                            <p class="subtitle">Have you ever been diagnosed or treated for:</p>
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            <p class="options">
                                High Blood Pressure?<br>
                                <span @click="toggleYesNo('blood', 'yes')" :class="{ 'selected' : formData.blood == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('blood', 'no')" :class="{ 'selected' : formData.blood == 'no'}">No</span>
                            </p>
                            <div class="subQ" v-show="formData.blood == 'yes'">
                                <p class="subtitle">
                                    Is your blood pressure currently in the normal range?<br>
                                    <span @click="toggleYesNo('blood1', 'yes')" :class="{ 'selected' : formData.blood1 == 'yes'}">Yes</span>
                                    <span @click="toggleYesNo('blood1', 'no')" :class="{ 'selected' : formData.blood1 == 'no'}">No</span>
                                    <span @click="toggleYesNo('blood1', 'dontknow')" :class="{ 'selected' : formData.blood1 == 'dontknow'}">I Don't Know</span>
                                </p>
                            </div>
                            <p class="options">
                                High Cholesterol?<br>
                                <span @click="toggleYesNo('cholesterol', 'yes')" :class="{ 'selected' : formData.cholesterol == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('cholesterol', 'no')" :class="{ 'selected' : formData.cholesterol == 'no'}">No</span>
                            </p>
                            <div class="subQ" v-show="formData.cholesterol == 'yes'">
                                <p class="subtitle">
                                    Is your cholesterol currently in the normal range?<br>
                                    <span @click="toggleYesNo('cholesterol1', 'yes')" :class="{ 'selected' : formData.cholesterol1 == 'yes'}">Yes</span>
                                    <span @click="toggleYesNo('cholesterol1', 'no')" :class="{ 'selected' : formData.cholesterol1 == 'no'}">No</span>
                                    <span @click="toggleYesNo('cholesterol1', 'dontknow')" :class="{ 'selected' : formData.cholesterol1 == 'dontknow'}">I Don't Know</span>
                                </p>
                            </div>
                            <p class="options">
                                Depression or Anxiety?<br>
                                <span @click="toggleYesNo('anxiety', 'yes')" :class="{ 'selected' : formData.anxiety == 'yes'}">Yes</span>
                                <span @click="toggleYesNo('anxiety', 'no')" :class="{ 'selected' : formData.anxiety == 'no'}">No</span>
                            </p>
                            <div class="subQ" v-show="formData.anxiety == 'yes'">
                                <p class="subtitle">
                                    Have you ever been admitted to a hospital for depression or anxiety?<br>
                                    <span @click="toggleYesNo('anxiety1', 'yes')" :class="{ 'selected' : formData.anxiety1 == 'yes'}">Yes</span>
                                    <span @click="toggleYesNo('anxiety1', 'no')" :class="{ 'selected' : formData.anxiety1 == 'no'}">No</span>
                                </p>
                            </div>

                            <div class="subQ" v-show="formData.anxiety == 'yes'">
                                <p class="subtitle">
                                    Have you had more than two episodes of depression or anxiety that required treatment in the past two years?<br>
                                    <span @click="toggleYesNo('anxiety2', 'yes')" :class="{ 'selected' : formData.anxiety2 == 'yes'}">Yes</span>
                                    <span @click="toggleYesNo('anxiety2', 'no')" :class="{ 'selected' : formData.anxiety2 == 'no'}">No</span>
                                </p>
                            </div>

                            <div class="subQ" v-show="formData.anxiety == 'yes'">
                                <p class="subtitle">
                                    Has your depression or anxiety ever caused you to become unemployed?<br>
                                    <span @click="toggleYesNo('anxiety3', 'yes')" :class="{ 'selected' : formData.anxiety3 == 'yes'}">Yes</span>
                                    <span @click="toggleYesNo('anxiety3', 'no')" :class="{ 'selected' : formData.anxiety3 == 'no'}">No</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div :class="[formSectionsClass.q5]" v-show="formSections.q5">
                        <div class="fs-fields fs-anim-upper">
                            <p class="subtitle nomargin">Are you currently getting paid to engage in any of the following occupations?</p>
                            <i class="titleInfo">Check all that apply.</i>
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            <ul class="ac-custom ac-boxfill">
                                <li>
                                    <input id="pilot" v-model="formData.occupation" value="pilot" type="checkbox">
                                    <label for="pilot">Commercial Pilot</label>
                                </li>
                                <li>
                                    <input id="diver" v-model="formData.occupation" value="diver" type="checkbox">
                                    <label for="diver">Scuba Diver</label>
                                </li>
                                <li>
                                    <input id="worker" v-model="formData.occupation" value="worker" type="checkbox">
                                    <label for="worker">Off-Shore Rig Worker</label>
                                </li>
                                <li>
                                    <input id="boxer" v-model="formData.occupation" value="boxer" type="checkbox">
                                    <label for="boxer">Boxer or Martial Artist</label>
                                </li>
                                <li>
                                    <input id="explosives" v-model="formData.occupation" value="explosives" type="checkbox">
                                    <label for="explosives">Handler of Explosives</label>
                                </li>
                                <li>
                                    <input id="chemicals" v-model="formData.occupation" value="chemicals" type="checkbox">
                                    <label for="chemicals">Handler of Dangerous Chemicals</label>
                                </li>
                                <li>
                                    <input id="stunt" v-model="formData.occupation" value="stunt" type="checkbox">
                                    <label for="stunt">Stunt Professional</label>
                                </li>
                                <li>
                                    <input id="noneO" v-model="formData.occupation" value="noneO" type="checkbox">
                                    <label for="noneO">None of the above</label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div :class="[formSectionsClass.q6]" v-show="formSections.q6">
                        <div class="fs-fields fs-anim-upper">
                            <p class="subtitle nomargin">Do you, or are you planning to engage in any of the following activities?</p>
                            <i class="titleInfo">Check all that apply.</i>
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            <ul class="ac-custom ac-boxfill">
                                <li>
                                    <input id="skydiving" v-model="formData.activities" value="skydiving" type="checkbox">
                                    <label for="skydiving">Skydiving or Base Jumping</label>
                                </li>
                                <li>
                                    <input id="flying" v-model="formData.activities" value="flying" type="checkbox">
                                    <label for="flying">Flying a Private Plane</label>
                                </li>
                                <li>
                                    <input id="scuba" v-model="formData.activities" value="scuba" type="checkbox">
                                    <label for="scuba">Scuba, Cave, Cliff or Wreck Diving</label>
                                </li>
                                <li>
                                    <input id="skiing" v-model="formData.activities" value="skiing" type="checkbox">
                                    <label for="skiing">Backcountry Skiing</label>
                                </li>
                                <li>
                                    <input id="gliding" v-model="formData.activities" value="gliding" type="checkbox">
                                    <label for="gliding">Hang Gliding</label>
                                </li>
                                <li>
                                    <input id="climbing" v-model="formData.activities" value="climbing" type="checkbox">
                                    <label for="climbing">Mountain Climbing</label>
                                </li>
                                <li>
                                    <input id="racing" v-model="formData.activities" value="racing" type="checkbox">
                                    <label for="racing">Car or Motorcycle Racing</label>
                                </li>
                                <li>
                                    <input id="noneA" v-model="formData.activities" value="noneA" type="checkbox">
                                    <label for="noneA">None of the above</label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-lg hidden-xs prev" @click="moveTo(prevQ)" v-show="prevQ">Prev</button>

                    <button class="btn btn-primary btn-lg hidden-xs" @click="moveTo(nextQ)">Next</button>
                </form>
            </div>
        </div>

        <div class="controls" v-show="formActive">
            <h2 class="title"><img :src="logo" class="logo"> Lifesprung</h2>

            <div class="submit clearfix">
                <button class="btn btn-primary btn-lg visible-xs pull-right" @click="moveTo(nextQ)">Next</button>

                <button class="btn btn-primary btn-lg visible-xs prev pull-right" @click="moveTo(prevQ)" v-show="prevQ">Prev</button>
            </div>

            <nav class="dots">
                <button :class="[formSections.q1 ? 'current-dot' : 'disabled']" @click="moveTo('1')"></button>
                <button :class="[formSections.q2 ? 'current-dot' : 'disabled']" @click="moveTo('2')"></button>
                <button :class="[formSections.q3 ? 'current-dot' : 'disabled']" @click="moveTo('3')"></button>
                <button :class="[formSections.q4 ? 'current-dot' : 'disabled']" @click="moveTo('4')"></button>
                <button :class="[formSections.q5 ? 'current-dot' : 'disabled']" @click="moveTo('5')"></button>
                <button :class="[formSections.q6 ? 'current-dot' : 'disabled']" @click="moveTo('6')"></button>
            </nav>

            <span class="pages">
                <span>{{ currentQ }}</span>/<span>{{ totalQ }}</span>
            </span>
        </div>
    </section>
</template>

<script>

    export default {
        data() {
            return {
                v1: false,
                qualified: true,
                formActive: false,
                formData: {
                    age: 35,
                    weight: 140,
                    feet: 5,
                    inches: 8,
                    work: 'no',
                    drink: 'no',
                    violation: 'no',
                    cancer: null,
                    diabetes: null,
                    sclerosis: null,
                    kidney: null,
                    heart: null,
                    liver: null,
                    stroke: null,
                    heartR: null,
                    cancerR: null,
                    blood: null,
                    cholesterol: null,
                    anxiety: null,
                    blood1: null,
                    cholesterol1: null,
                    anxiety1: null,
                    anxiety2: null,
                    anxiety3: null,
                    occupation: [],
                    activities: []
                },
                formSections: {
                    q1: true,
                    q2: false,
                    q3: false,
                    q4: false,
                    q5: false,
                    q6: false,
                },
                formSectionsClass: {
                    q1: 'fs-showing',
                    q2: null,
                    q3: null,
                    q4: null,
                    q5: null,
                    q6: null,
                },
                totalQ: 6,
                prevQ: 0,
                nextQ: 2,
                currentQ: 1,
                summary: false
            }
        },

        props: {
            logo: null
        },

        methods: {
            toggleYesNo(data, value) {
                this.formData[data] = value;
            },

            moveTo(target) {
                let t_currentQ = 'q' + this.currentQ;

                this.formSectionsClass[t_currentQ] = 'fs-hiding';

                if (target == 'summary') {
                    this.summary = true;

                    setTimeout(() => {
                        this.formActive = false;
                    }, 500);

                    return;
                }

                let t_targetQ = 'q' + target;

                setTimeout(() => {
                    scrollTo(document.body, 0, 100);
                    
                    this.formSections[t_targetQ] = true;

                    this.formSectionsClass[t_targetQ] = 'fs-showing';
                }, 400);

                setTimeout(() => {
                    this.formSections[t_currentQ] = false;

                    this.currentQ = target;

                    this.prevQ = this.currentQ - 1 > 0 ? this.currentQ - 1 : 0;

                    this.nextQ = parseInt(this.currentQ) + 1;

                    if (this.totalQ == target) {
                        this.nextQ = 'summary';

                        return;
                    }
                }, 400);
            },

            activateForm() {
                this.formActive = true;
            },

            hasSickness(sickness) {
                return this.formData.sicknessSub.includes(sickness);
            }
        },

        mounted() {

        }
    }
</script>
