<template>
    <section>
        <div class="container">
            <transition name="flipX" mode="out-in">
                <template>
                    <div class="row flex-center full-height" v-if="formActive" key="form" v-touch:swipe="swipeHandler(currentQ)">
                        <div class="col-sm-8 col-sm-offset-2">
                            <transition name="fade" mode="out-in">
                                    <div class="questions" v-if="currentQ === 'name'" key="name">
                                        <h2 class="ask">Hi, what's your name?</h2>

                                        <input type="text" v-model="formData.name" :autofocus="currentQ === 'name'" @keyup.enter="proceed('age', 10)">

                                        <transition name="light-speed-in">
                                            <div v-if="formData.name !== null" id="okButton">
                                                <button class="btn btn-lg btn-primary" @click.prevent="proceed('age', 10)">OK</button>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'age'" key="age">
                                        <h2 class="ask">Hi <b class="text-primary">{{ formData.name }}</b>, what's your age?</h2>

                                        <!-- <select v-model="formData.age" ref="age" @change="proceed('weight', 14, 300)" :class="{ 'selected animated flash': formData.age !== null}">
                                            <option :value="n + 17" v-for="n in 33">{{ n + 17 }}</option>   
                                        </select> -->

                                        <input type="number" :autofocus="currentQ === 'age'" v-model="formData.age" min="18" max="50" @wheel="scrollValue('age', 18, 50, 1)">

                                        <transition name="light-speed-in" appear>
                                            <div>
                                                <button class="btn btn-lg btn-primary" @click.prevent="proceed('weight', 14, 300)">OK</button>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'weight'" key="weight">
                                        <h2 class="ask">What is your weight?</h2>

                                        <p class="subTitle">(pounds) Choose the closest value to your actual weight.</p>

                                         <!-- <select v-model="formData.weight" ref="weight" @change="proceed('height', 18, 300)" :class="{ 'selected animated flash': formData.weight !== null}">
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
                                        </select> -->

                                        <input type="number" v-model="formData.weight" step="5" min="60" max="400" @wheel="scrollValue('weight', 60, 400, 5)">

                                        <transition name="light-speed-in" appear>
                                            <div>
                                                <button class="btn btn-lg btn-primary" @click.prevent="proceed('heightF', 18, 300)">OK</button>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'heightF' || currentQ === 'heightI'" key="heightF">
                                        <h2 class="ask">What is your height?</h2>

                                        <!-- <select v-model="formData.height" ref="height" @change="proceed('drink', 22, 300)" :class="{ 'selected animated flash': formData.height !== null}">
                                            <option value="49">4’1”</option>
                                            <option value="50">4’2”</option>
                                            <option value="51">4’3”</option>
                                            <option value="52">4’4”</option>
                                            <option value="54">4’5”</option>
                                            <option value="54">4’6”</option>
                                            <option value="55">4’7”</option>
                                            <option value="56">4’8”</option>
                                            <option value="57">4’9”</option>
                                            <option value="58">4’10”</option>
                                            <option value="59">4’11”</option>
                                            <option value="60">5’0”</option>
                                            <option value="61">5’1”</option>
                                            <option value="62">5’2”</option>
                                            <option value="63">5’3”</option>
                                            <option value="64">5’4”</option>
                                            <option value="65">5’5”</option>
                                            <option value="66">5’6”</option>
                                            <option value="67">5’7”</option>
                                            <option value="68">5’8”</option>
                                            <option value="69">5’9”</option>
                                            <option value="70">5’10”</option>
                                            <option value="71">5’11”</option>
                                            <option value="72">6’0”</option>
                                            <option value="72">6’1”</option>
                                            <option value="74">6’2”</option>
                                            <option value="75">6’3”</option>
                                            <option value="76">6’4”</option>
                                            <option value="77">6’5”</option>
                                            <option value="78">6’6”</option>
                                            <option value="79">6’7”</option>
                                            <option value="80">6’8”</option>
                                            <option value="81">6’9”</option>
                                            <option value="82">6’10”</option>
                                            <option value="83">6’11”</option>
                                            <option value="84">7’0”</option>
                                            <option value="85">7’1”</option>
                                            <option value="86">7’2”</option>
                                            <option value="87">7’3”</option>
                                            <option value="88">7’4”</option>
                                            <option value="89">7’5”</option>
                                            <option value="90">7’6”</option>
                                            <option value="91">7’7”</option>
                                            <option value="92">7’8”</option>
                                            <option value="93">7’9”</option>
                                            <option value="94">7’10”</option>
                                            <option value="95">7’11”</option>
                                        </select> -->

                                        <input class="half" type="number" v-model="formData.heightF" step="1" min="3" max="7" @wheel="scrollValue('heightF', 3, 7, 1)"> <span class="halfLabel">feet</span>

                                        <input class="half" type="number" v-model="formData.heightI" step="1" min="1" max="11" @wheel="scrollValue('heightI', 1, 11, 1)"> <span class="halfLabel">inches</span>

                                        <transition name="light-speed-in" appear>
                                            <div>
                                                <button class="btn btn-lg btn-primary" @click.prevent="proceed('drink', 22, 300)">OK</button>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'drink'" key="drink">
                                        <h2 class="ask smaller">Do you drink more than 21 drinks per week?</h2>

                                        <p class="subTitle">(one beer, one glass of wine or an ounce of liquor are all considered one drink)</p>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('violation', 25, 300, 'yes', 'drink')" :class="{ 'selected animated flash': formData.drink === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('violation', 25, 300, 'no', 'drink')" :class="{ 'selected animated flash': formData.drink === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'violation'" key="violation">
                                        <h2 class="ask smaller">Have you had more than one moving violation while driving in the past 12 months?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('work', 31, 300, 'yes', 'violation')" :class="{ 'selected animated flash': formData.violation === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('work', 31, 300, 'no', 'violation')" :class="{ 'selected animated flash': formData.violation === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'work'" key="work">
                                        <h2 class="ask smaller">Do you currently work full-time (at least 30 hours per week)?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('diabetes', 36, 300, 'yes', 'work')" :class="{ 'selected animated flash': formData.work === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('diabetes', 36, 300, 'no', 'work')" :class="{ 'selected animated flash': formData.work === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'diabetes'" key="diabetes">
                                        <h2 class="ask smaller">Have you ever been diagnosed or treated for:</h2>

                                        <h2 class="ask">Diabetes?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('sclerosis', 40, 300, 'yes', 'diabetes')" :class="{ 'selected animated flash': formData.diabetes === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('sclerosis', 40, 300, 'no', 'diabetes')" :class="{ 'selected animated flash': formData.diabetes === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'sclerosis'" key="sclerosis">
                                        <h2 class="ask smaller">Have you ever been diagnosed or treated for:</h2>

                                        <h2 class="ask">Multiple Sclerosis?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('cancer', 43, 300, 'yes', 'sclerosis')" :class="{ 'selected animated flash': formData.sclerosis === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('cancer', 43, 300, 'no', 'sclerosis')" :class="{ 'selected animated flash': formData.sclerosis === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'cancer'" key="cancer">
                                        <h2 class="ask smaller">Have you ever been diagnosed or treated for:</h2>

                                        <h2 class="ask">Cancer?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('kidney', 49, 300, 'yes', 'cancer')" :class="{ 'selected animated flash': formData.cancer === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('kidney', 49, 300, 'no', 'cancer')" :class="{ 'selected animated flash': formData.cancer === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                     <div class="questions" v-else-if="currentQ === 'kidney'" key="kidney">
                                        <h2 class="ask smaller">Have you ever been diagnosed or treated for:</h2>

                                        <h2 class="ask">Kidney Disease?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('heart', 55, 300, 'yes', 'kidney')" :class="{ 'selected animated flash': formData.kidney === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('heart', 55, 300, 'no', 'kidney')" :class="{ 'selected animated flash': formData.kidney === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                     <div class="questions" v-else-if="currentQ === 'heart'" key="heart">
                                        <h2 class="ask smaller">Have you ever been diagnosed or treated for:</h2>

                                        <h2 class="ask">Heart Disease?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('liver', 55, 300, 'yes', 'heart')" :class="{ 'selected animated flash': formData.heart === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('liver', 55, 300, 'no', 'heart')" :class="{ 'selected animated flash': formData.heart === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'liver'" key="liver">
                                        <h2 class="ask smaller">Have you ever been diagnosed or treated for:</h2>

                                        <h2 class="ask">Liver Disease?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('continue', 61, 300, 'yes', 'liver')" :class="{ 'selected animated flash': formData.liver === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('continue', 61, 300, 'no', 'liver')" :class="{ 'selected animated flash': formData.liver === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'continue'" key="continue">
                                        <h2 class="ask">Few more questions to go! Almost there.</h2>

                                        <transition name="light-speed-in">
                                            <div>
                                                <button class="btn btn-lg btn-primary" @click.prevent="proceed('blood', 63)">CONTINUE</button> or press <b>ENTER</b>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'blood'" key="blood">
                                        <h2 class="ask smaller">Have you ever been diagnosed or treated for:</h2>

                                        <h2 class="ask">High Blood Pressure?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('bloodRange', 63, 300, 'yes', 'blood')" :class="{ 'selected animated flash': formData.blood === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('cholesterol', 65, 300, 'no', 'blood')" :class="{ 'selected animated flash': formData.blood === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'bloodRange'" key="bloodRange">
                                        <h2 class="ask smaller">Is your blood pressure currently in the normal range?</h2>

                                        <div class="checkMark smaller">
                                            <a @click.prevent="proceed('cholesterol', 65, 300, 'yes', 'bloodRange')" :class="{ 'selected animated flash': formData.bloodRange === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('cholesterol', 65, 300, 'no', 'bloodRange')" :class="{ 'selected animated flash': formData.bloodRange === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                            <a @click.prevent="proceed('cholesterol', 65, 300, 'noIdea', 'bloodRange')" :class="{ 'selected animated flash': formData.bloodRange === 'noIdea'}"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span><br>I Don't Know</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'cholesterol'" key="cholesterol">
                                        <h2 class="ask smaller">Have you ever been diagnosed or treated for:</h2>

                                        <h2 class="ask">High Cholesterol?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('cholesterolRange', 67, 300, 'yes', 'cholesterol')" :class="{ 'selected animated flash': formData.cholesterol === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('anxiety', 70, 300, 'no', 'cholesterol')" :class="{ 'selected animated flash': formData.cholesterol === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'cholesterolRange'" key="cholesterolRange">
                                        <h2 class="ask smaller">Is your cholesterol currently in the normal range?</h2>

                                        <div class="checkMark smaller">
                                            <a @click.prevent="proceed('anxiety', 70, 300, 'yes', 'cholesterolRange')" :class="{ 'selected animated flash': formData.cholesterolRange === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('anxiety', 70, 300, 'no', 'cholesterolRange')" :class="{ 'selected animated flash': formData.cholesterolRange === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                            <a @click.prevent="proceed('anxiety', 70, 300, 'noIdea', 'cholesterolRange')" :class="{ 'selected animated flash': formData.cholesterolRange === 'noIdea'}"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span><br>I Don't Know</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'anxiety'" key="anxiety">
                                        <h2 class="ask smaller">Have you ever been diagnosed or treated for:</h2>

                                        <h2 class="ask">Depression or Anxiety?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('anxietyHospitalize', 73, 300, 'yes', 'anxiety')" :class="{ 'selected animated flash': formData.anxiety === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('stroke', 80, 300, 'no', 'anxiety')" :class="{ 'selected animated flash': formData.anxiety === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'anxietyHospitalize'" key="anxietyHospitalize">
                                        <h2 class="ask smaller">Have you ever been admitted to a hospital for depression or anxiety?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('anxietyTwoyears', 76, 300, 'yes', 'anxietyHospitalize')" :class="{ 'selected animated flash': formData.anxietyHospitalize === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('anxietyTwoyears', 76, 300, 'no', 'anxietyHospitalize')" :class="{ 'selected animated flash': formData.anxietyHospitalize === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'anxietyTwoyears'" key="anxietyTwoyears">
                                        <h2 class="ask smaller">Have you had more than two episodes of depression or anxiety that required treatment in the past two years?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('anxietyUnemployed', 78, 300, 'yes', 'anxietyTwoyears')" :class="{ 'selected animated flash': formData.anxietyTwoyears === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('anxietyUnemployed', 78, 300, 'no', 'anxietyTwoyears')" :class="{ 'selected animated flash': formData.anxietyTwoyears === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'anxietyUnemployed'" key="anxietyUnemployed">
                                        <h2 class="ask smaller">Has your depression or anxiety ever caused you to become unemployed?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('stroke', 80, 300, 'yes', 'anxietyUnemployed')" :class="{ 'selected animated flash': formData.anxietyUnemployed === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('stroke', 80, 300, 'no', 'anxietyUnemployed')" :class="{ 'selected animated flash': formData.anxietyUnemployed === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'stroke'" key="stroke">
                                        <h2 class="ask smaller">Have 2 or more of your parents or siblings been diagnosed before the age of sixty with:</h2>

                                        <h2 class="ask">Stroke?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('familyHeart', 83, 300, 'yes', 'stroke')" :class="{ 'selected animated flash': formData.stroke === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('familyHeart', 83, 300, 'no', 'stroke')" :class="{ 'selected animated flash': formData.stroke === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'familyHeart'" key="familyHeart">
                                        <h2 class="ask smaller">Have 2 or more of your parents or siblings been diagnosed before the age of sixty with:</h2>

                                        <h2 class="ask">Heart Disease?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('familyCancer', 87, 300, 'yes', 'familyHeart')" :class="{ 'selected animated flash': formData.familyHeart === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('familyCancer', 87, 300, 'no', 'familyHeart')" :class="{ 'selected animated flash': formData.familyHeart === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'familyCancer'" key="familyCancer">
                                        <h2 class="ask smaller">Have 2 or more of your parents or siblings been diagnosed before the age of sixty with:</h2>

                                        <h2 class="ask">Cancer?</h2>

                                        <div class="checkMark">
                                            <a @click.prevent="proceed('occupations', 90, 300, 'yes', 'familyCancer')" :class="{ 'selected animated flash': formData.familyCancer === 'yes'}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br>Yes</a>
                                            <a @click.prevent="proceed('occupations', 90, 300, 'no', 'familyCancer')" :class="{ 'selected animated flash': formData.familyCancer === 'no'}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br>No</a>
                                        </div>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'occupations'" key="occupations">
                                        <h2 class="ask smallest smallMargin">Are you currently getting paid to engage in any of the following occupations?</h2>

                                        <p class="caption text-info">Click all that apply.</p>

                                        <div class="checkList">
                                            <a :class="{ 'selected animated flash': formData.occupations.pilot === true }" @click.prevent="toggleOccupations('pilot')">Commercial Pilot<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.occupations.diver === true }" @click.prevent="toggleOccupations('diver')">Scuba Diver<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.occupations.worker === true }" @click.prevent="toggleOccupations('worker')">Off-Shore Rig Worker<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.occupations.artist === true }" @click.prevent="toggleOccupations('artist')">Boxer or Martial Artist<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.occupations.bomber === true }" @click.prevent="toggleOccupations('bomber')">Handler of Explosives<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.occupations.chemist === true }" @click.prevent="toggleOccupations('chemist')">Handler of Dangerous Chemicals<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.occupations.stunt === true }" @click.prevent="toggleOccupations('stunt')">Stunt Professional<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.occupations.none === true }" @click.prevent="toggleOccupations('none')">None of the above<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                        </div>

                                        <transition name="light-speed-in">
                                            <div v-if="occupationsTriggered">
                                                <button class="btn btn-lg btn-primary" @click.prevent="proceed('activities', 95)">OK</button> or press <b>ENTER</b>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions" v-else-if="currentQ === 'activities'" key="activities">
                                        <h2 class="ask smallest smallMargin">Do you, or are you planning to engage in any of the following activities?</h2>

                                        <p class="caption text-info">Click all that apply.</p>

                                        <div class="checkList">
                                            <a :class="{ 'selected animated flash': formData.activities.jumping === true }" @click.prevent="toggleActivities('jumping')">Skydiving or Base Jumping<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.activities.flying === true }" @click.prevent="toggleActivities('flying')">Flying a Private Plane<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.activities.scuba === true }" @click.prevent="toggleActivities('scuba')">Scuba, Cave, Cliff or Wreck Diving<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.activities.skiing === true }" @click.prevent="toggleActivities('skiing')">Backcountry Skiing<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.activities.gliding === true }" @click.prevent="toggleActivities('gliding')">Hang Gliding<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.activities.climbing === true }" @click.prevent="toggleActivities('climbing')">Mountain Climbing<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.activities.racing === true }" @click.prevent="toggleActivities('racing')">Car or Motorcycle Racing<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                            <a :class="{ 'selected animated flash': formData.activities.none === true }" @click.prevent="toggleActivities('none')">None of the above<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                        </div>

                                        <transition name="light-speed-in">
                                            <div v-if="activitiesTriggered">
                                                <button class="btn btn-lg btn-primary" @click.prevent="proceed('result', 100, 300)">OK</button> or press <b>ENTER</b>
                                            </div>
                                        </transition>
                                    </div>

                                    <div class="questions text-center" v-else-if="currentQ === 'result'" key="result">
                                        <h2 class="animated zoomIn mainTitle resultTitle" v-if="qualified">It is very likely that you will qualify for low-cost life insurance.</h2>

                                        <h2 class="animated zoomIn mainTitle resultTitle" v-else>We need ask you more questions to evaluate your eligibility.</h2>

                                        <h2 class="ask smaller caption animated fadeInDown">Please call us at</h2>

                                        <a href="tel:5555555555" class="btn btn-lg btn-primary">555-555-5555</a>
                                    </div>
                            </transition>
                        </div>
                    </div>

                    <div class="row flex-center full-height" v-else key="landing">
                        <div class="col-sm-12 text-center">
                            <img :src="logo" class="logo img-responsive flipInX animated">

                            <h1 class="animated zoomIn mainTitle">Lifesprung</h1>

                            <p class="animated fadeInDown subTitle">Find out if you are likely to qualify <br>for the lowest life insurance rates by answering the following questions:</p>

                            <button class="btn btn-lg btn-primary" @click.prevent="activateForm">Start Here</button>    
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
            <div class="pull-right" v-if="currentQ !== 'result'">
                <button v-show="currentQ !== 'name'" @click="getPrev()" class="btn btn-sm btn-primary">prev</button>
                <button :disabled="formData[currentQ] == null" v-show="currentQ !== 'activities'" @click="getNext()" class="btn btn-sm btn-primary">next</button>
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
                    name: '',
                    age: 25,
                    weight: 60,
                    heightF: 5,
                    heightI: 8,
                    drink: '',
                    violation: '',
                    work: '',
                    diabetes: '',
                    sclerosis: '',
                    cancer: '',
                    kidney: '',
                    heart: '',
                    liver: '',
                    blood: '',
                    bloodRange: '',
                    cholesterol: '',
                    cholesterolRange: '',
                    anxiety: '',
                    anxietyHospitalize: '',
                    anxietyTwoyears: '',
                    anxietyUnemployed: '',
                    stroke: '',
                    familyHeart: '',
                    familyCancer: '',
                    occupations: {
                        pilot: false,
                        diver: false,
                        worker: false,
                        artist: false,
                        bomber: false,
                        chemist: false,
                        stunt: false,
                        none: false
                    },
                    activities: {
                        jumping: false,
                        flying: false,
                        scuba: false,
                        skiing: false,
                        gliding: false,
                        climbing: false,
                        racing: false,
                        none: false
                    }
                },
                occupationsTriggered: false,
                activitiesTriggered: false,
                qualified: true
            }
        },

        props: {
            logo: null
        },

        mounted() {
            
        },

        methods: {
            activateForm() {
                this.formActive = true;
            },

            bmi() {
                let h = (this.formData.heightF * 12) + this.formData.heighI;

                return Math.round((this.formData.weight / (h * h)) * 703);
            },

            swipeHandler(param) {
                return function(direction, event) {
                    if (direction == 'top' || direction == 'left') {
                        this.getNext();
                    }

                    if (direction == 'bottom' || direction == 'right') {
                        this.getPrev();
                    }
                }.bind(this);
            },

            getNext() {
                let next = null;

                let nextOne = false;

                let current = this.currentQ;

                if (current === 'activities') {
                    return false;
                }

                Object.keys(this.formData).forEach(key => {
                    if (nextOne) {
                        this.currentQ = key;

                        nextOne = false;
                    }

                    if (key == current) {
                        nextOne = true;
                    }

                    next = key;
                });
            },

            getPrev() {
                let prev = null;

                if (this.currentQ === 'name') {
                    return false;
                }

                Object.keys(this.formData).forEach(key => {
                    if (key == this.currentQ) {
                        this.currentQ = prev;
                    }

                    prev = key;
                });
            },

            proceed(target, percentage, delay = 0, data = null, elem = null) {
                if (data) {
                    this.formData[elem] = data;
                }

                setTimeout(() => {
                    this.currentQ = target;

                    this.progress = percentage;

                    if (target == 'result') {
                        this.showResults();
                    }
                }, delay);

                if (target == 'continue') {
                    setTimeout(() => {
                        this.currentQ = 'blood';

                        this.progress = 63;
                    }, 2000);
                }
            },

            showResults() {
                let bmi = this.bmi();

                if (bmi < 19
                    || bmi > 33
                    || this.formData.drink == 'yes'
                    || this.formData.violation == 'yes'
                    || this.formData.work == 'no'
                    || this.formData.diabetes == 'yes'
                    || this.formData.sclerosis == 'yes'
                    || this.formData.cancer == 'yes'
                    || this.formData.kidney == 'yes'
                    || this.formData.heart == 'yes'
                    || this.formData.liver == 'yes'
                    || this.formData.blood == 'yes'
                    || this.formData.cholesterol == 'yes'
                    || this.formData.anxiety == 'yes'
                    || this.formData.violation == 'yes'
                    || this.formData.stroke == 'yes'
                    || this.formData.familyHeart == 'yes'
                    || this.formData.familyCancer == 'yes'
                    || this.formData.occupations.none == false
                    || this.formData.activities.none == false) {
                    this.qualified = false;
                }

                if (this.formData.blood == 'yes') {
                    if (this.formData.bloodRange != 'yes') {
                        this.qualified = false;
                    }
                }

                if (this.formData.cholesterol == 'yes') {
                    if (this.formData.cholesterolRange != 'yes') {
                        this.qualified = false;
                    }
                }

                if (this.formData.anxiety == 'yes') {
                    if (this.formData.anxietyHospitalize == 'yes'
                        || this.formData.anxietyTwoyears == 'yes'
                        || this.formData.anxietyUnemployed == 'yes') {
                        this.qualified = false;
                    }
                }
            },

            toggleActivities(data) {
                 if (data == 'none') {
                    this.formData.activities.none = true;

                    if (this.formData.activities.none) {
                        this.formData.activities.jumping = false;
                        this.formData.activities.flying = false;
                        this.formData.activities.scuba = false;
                        this.formData.activities.skiing = false;
                        this.formData.activities.gliding = false;
                        this.formData.activities.climbing = false;
                        this.formData.activities.racing = false;
                    }
                } else {
                    this.formData.activities[data] = ! this.formData.activities[data];

                    this.formData.activities.none = false;
                }

                this.activitiesTriggered = true;
            },

            toggleOccupations(data) {
                if (data == 'none') {
                    this.formData.occupations.none = true;

                    if (this.formData.occupations.none) {
                        this.formData.occupations.pilot = false;
                        this.formData.occupations.diver = false;
                        this.formData.occupations.worker = false;
                        this.formData.occupations.artist = false;
                        this.formData.occupations.bomber = false;
                        this.formData.occupations.chemist = false;
                        this.formData.occupations.stunt = false;
                    }
                } else {
                    this.formData.occupations[data] = ! this.formData.occupations[data];

                    this.formData.occupations.none = false;
                }

                this.occupationsTriggered = true;
            },

            scrollValue(event, data, min, max, step) {
                if (event.deltaY < 0) {
                    if (this.formData[data] != max) {
                        this.formData[data] = this.formData[data] + step;
                    }
                } else {
                    if (this.formData[data] != min) {
                        this.formData[data] = this.formData[data] - step;
                    }
                }
            }
        }
    }
</script>