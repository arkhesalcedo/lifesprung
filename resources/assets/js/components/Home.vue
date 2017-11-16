<template>
    <section>
        <div class="full-height flex-center" :class="{ 'bg': formActive }">
            <div class="content" v-show="! formActive">
                <img :src="logo" class="logo">

                <h1 class="title">
                    Lifesprung
                </h1>

                <p class="subtitle" v-if="summary">
                    Thank you! <br>
                    We will be in touch.
                </p>

                <p class="subtitle" v-else>
                    Find out if you are likely to qualify for the <br>
                    lowest life insurance rates by answering the following questions:
                </p>

                <button @click="activateForm" class="button" v-show="! summary">Start Here</button>
            </div>

            <div class="container" :class="{ 'containerVisible': formActive }">
                <form class="theForm" @submit.prevent="" autocomplete="off">
                    <div :class="[formSectionsClass.q1]" v-show="formSections.q1">
                        <div class="fs-fields fs-anim-upper">
                            I am

                            <select v-model="formData.age" name="age">
                                <option :value="n + 17" v-for="n in 33">{{ n + 17 }}</option>   
                            </select>

                            years old and <br>

                            I weight about <select v-model="formData.weight" name="weight">
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
                            </select> pounds.
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            I am

                            <select v-model="formData.feet" name="feet">
                                <option :value="n + 3" v-for="n in 8">{{ n + 3 }}</option>   
                            </select> feet and

                            <select v-model="formData.inches" name="inches">
                                <option :value="n + 1" v-for="n in 10">{{ n + 1 }}</option>   
                            </select> inches tall.<br><br>

                            I currently work

                            <select v-model="formData.work" name="work">
                                <option value="yes">more than</option>
                                <option value="no">less than</option> 
                                <option value="about">about</option> 
                            </select> thirty hours per week.
                        </div>
                    </div>

                    <div :class="[formSectionsClass.q2]" v-show="formSections.q2">
                        <div class="fs-fields fs-anim-upper">
                            I typically drink

                            <select v-model="formData.drink" name="drink">
                                <option value="yes">more</option>
                                <option value="no">less</option>
                            </select> than 21 drinks per week.<br><br>

                            I

                            <select v-model="formData.violation" name="violation">
                                <option value="yes">had</option>
                                <option value="no">didn’t have</option> 
                            </select> more than one moving violation in the past 12 months.
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            Have you ever been diagnosed or treated for:<br>

                            <ul class="ac-custom ac-checkbox ac-boxfill">
                                <li>
                                    <input id="cancer" v-model="formData.sickness" value="cancer" type="checkbox">
                                    <label for="cancer">Cancer?</label>
                                </li>
                                <li>
                                    <input id="diabetes" v-model="formData.sickness" value="diabetes" type="checkbox">
                                    <label for="diabetes">Diabetes?</label>
                                </li>
                                <li>
                                    <input id="sclerosis" v-model="formData.sickness" value="sclerosis" type="checkbox">
                                    <label for="sclerosis">Multiple Sclerosis?</label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div :class="[formSectionsClass.q3]" v-show="formSections.q3">
                        <div class="fs-fields fs-anim-upper">
                            Have you ever been diagnosed or treated for:<br>

                            <ul class="ac-custom ac-checkbox ac-boxfill">
                                <li>
                                    <input id="kidney" v-model="formData.sickness" value="kidney" type="checkbox">
                                    <label for="kidney">Kidney Disease?</label>
                                </li>
                                <li>
                                    <input id="heart" v-model="formData.sickness" value="heart" type="checkbox">
                                    <label for="heart">Heart Disease?</label>
                                </li>
                                <li>
                                    <input id="liver" v-model="formData.sickness" value="liver" type="checkbox">
                                    <label for="liver">Liver Disease?</label>
                                </li>
                            </ul>
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            Have 2 or more of your parents or siblings been diagnosed before the age of sixty with:<br>

                            <ul class="ac-custom ac-checkbox ac-boxfill">
                                <li>
                                    <input id="stroke" v-model="formData.sicknessRelative" value="stroke" type="checkbox">
                                    <label for="stroke">Stroke?</label>
                                </li>
                                <li>
                                    <input id="heartR" v-model="formData.sicknessRelative" value="heart" type="checkbox">
                                    <label for="heartR">Heart Disease?</label>
                                </li>
                                <li>
                                    <input id="cancerR" v-model="formData.sicknessRelative" value="cancer" type="checkbox">
                                    <label for="cancerR">Cancer?</label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div :class="[formSectionsClass.q4]" v-show="formSections.q4">
                        <div class="fs-fields fs-anim-upper">
                            Have you ever been diagnosed or treated for:<br>
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            <ul class="ac-custom ac-checkbox ac-boxfill">
                                <li>
                                    <input id="blood" v-model="formData.sicknessSub" value="blood" type="checkbox">
                                    <label for="blood">High Blood Pressure?</label>
                                </li>
                                <li v-show="hasSickness('blood')">
                                    <div class="subQ">
                                        Is your blood pressure currently in the normal range?<br>

                                        <ul class="ac-custom ac-radio ac-fill">
                                            <li>
                                                <input id="yesBlood" v-model="formData.sicknessSubOptions.blood" name="bloodSub" value="yes" type="radio">
                                                <label for="yesBlood">Yes</label>
                                            </li>
                                            <li>
                                                <input id="noBlood" v-model="formData.sicknessSubOptions.blood" name="bloodSub" value="no" type="radio">
                                                <label for="noBlood">No</label>
                                            </li>
                                            <li>
                                                <input id="dontKnowBlood" v-model="formData.sicknessSubOptions.blood" name="bloodSub" value="dontKnow" type="radio">
                                                <label for="dontKnowBlood">I Don't Know</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <input id="cholesterol" v-model="formData.sicknessSub" value="cholesterol" type="checkbox">
                                    <label for="cholesterol">High Cholesterol?</label>
                                </li>
                                <li v-show="hasSickness('cholesterol')">
                                    <div class="subQ">
                                        Is your cholesterol currently in the normal range?<br>

                                        <ul class="ac-custom ac-radio ac-fill">
                                            <li>
                                                <input id="yescholesterol" v-model="formData.sicknessSubOptions.cholesterol" name="cholesterolSub" value="yes" type="radio">
                                                <label for="yescholesterol">Yes</label>
                                            </li>
                                            <li>
                                                <input id="nocholesterol" v-model="formData.sicknessSubOptions.cholesterol" name="cholesterolSub" value="no" type="radio">
                                                <label for="nocholesterol">No</label>
                                            </li>
                                            <li>
                                                <input id="dontKnowcholesterol" v-model="formData.sicknessSubOptions.cholesterol" name="cholesterolSub" value="dontKnow" type="radio">
                                                <label for="dontKnowcholesterol">I Don't Know</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <input id="anxiety" v-model="formData.sicknessSub" value="anxiety" type="checkbox">
                                    <label for="anxiety">Depression or Anxiety?</label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div :class="[formSectionsClass.q5]" v-show="formSections.q5">
                        <div class="fs-fields fs-anim-upper">
                            Are you currently getting paid to engage in any of the following occupations?<br>
                            <i class="titleInfo">Check all that apply.</i>
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            <ul class="ac-custom ac-checkbox ac-boxfill">
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
                            Do you, or are you planning to engage in any of the following activities?<br>
                            <i class="titleInfo">Check all that apply.</i>
                        </div>

                        <div class="fs-fields fs-anim-lower">
                            <ul class="ac-custom ac-checkbox ac-boxfill">
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
                </form>
            </div>
        </div>

        <div class="fs-controls" v-show="formActive">
            <h2>Lifesprung</h2>

            <div class="submit-wrap">
                <button class="button" @click="moveTo(nextQ)">Next</button>
            </div>

            <nav class="nav-dots">
                <button :class="[formSections.q1 ? 'current-dot' : 'disabled']" @click="moveTo('1')"></button>
                <button :class="[formSections.q2 ? 'current-dot' : 'disabled']" @click="moveTo('2')"></button>
                <button :class="[formSections.q3 ? 'current-dot' : 'disabled']" @click="moveTo('3')"></button>
                <button :class="[formSections.q4 ? 'current-dot' : 'disabled']" @click="moveTo('4')"></button>
                <button :class="[formSections.q5 ? 'current-dot' : 'disabled']" @click="moveTo('5')"></button>
                <button :class="[formSections.q6 ? 'current-dot' : 'disabled']" @click="moveTo('6')"></button>
            </nav>

            <span class="numbers">
                <span>{{ currentQ }}</span>/<span>{{ totalQ }}</span>
            </span>
        </div>
    </section>
</template>

<script>

    export default {
        data() {
            return {
                nlform: null,
                formActive: false,
                formData: {
                    age: 35,
                    weight: 140,
                    feet: 5,
                    inches: 8,
                    work: 'no',
                    drink: 'no',
                    violation: 'no',
                    sickness: [],
                    sicknessRelative: [],
                    sicknessSub: [],
                    sicknessSubOptions: {
                        blood: null,
                        cholesterol: null,
                        anxiety: null
                    },
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
                nextQ: 2,
                currentQ: 1,
                summary: false
            }
        },

        props: {
            logo: null
        },

        methods: {
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
                    this.formSections[t_targetQ] = true;

                    this.formSectionsClass[t_targetQ] = 'fs-showing';
                }, 300);

                setTimeout(() => {
                    this.formSections[t_currentQ] = false;

                    this.currentQ = target;

                    this.nextQ = this.currentQ + 1;

                    if (this.totalQ == target) {
                        this.nextQ = 'summary';

                        return;
                    }
                }, 500);
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
