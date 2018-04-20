
  <?php 
    $contact_header = get_field('contact_header');
    $contact_body = get_field('contact_body');
    $address = get_field('contact_address');
    $postal_code = get_field('postal_code');
    $city = get_field('city');
    $phone = get_field('contact_phone');
    $email = get_field('contact_email');
    
    
  ?>


<div id="contact">
    <div class="row">
            <div class="column">
                <h2 class="text-left"><?php echo $contact_header; ?></h2>
                <p><?php echo $contact_body; ?></p>
            </div>
    </div>
    <div class="row contact-box align-justify">

    
    <div class="contact-form column small-12 medium-6 large-6">
    
            <form method="post" novalidate="true"> 

            <p v-if="errors.length">
                <b>Please Correct</b>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </p>
            <p v-if="success">
                <b>Skickat!</b>
            </p>    
                <div>
                    <div>
                        <label for="fullname">Namn</label>
                        <input id="fullname" type="text"  name="name" v-model="name">                    
                    </div>
                    <div>
                        <label for="email">E-mail</label>                        
                        <input id="email" type="text"name="email" v-model="email">
                    </div>
                    <div>
                        <label for="phone">Telefonnummer</label>                        
                        <input id="phone" type="text" name="phone" v-model="phone">                          
                    </div>
                </div>
                <label for="message">Ditt meddelnade</label>                
                <textarea name="message" id="message" cols="15" rows="5" v-model="message" ></textarea>         
                <button class="button" v-on:click="checkForm">Skicka</button>
            </form>
        </div>
        <div class="column contact-info small-12 medium-6 large-5">
                <div>
                <div class="address">
                    <i class="ion-ios-location"></i>
                    <div>
                        <p>
                            <?php  echo $address ?><br>
                            <?php  echo $postal_code ?>
                            <?php  echo $city ?><br>
                         </p>
                    </div>
                </div>            
                <div class="phone-number"><a href="#"> <i class="ion-ios-telephone"></i><span> <? echo $phone ?></span></a></div>
                <div class="mail"><a href="#"><i class="ion-android-mail"></i><span><? echo $email ?></span></a></div>
                <!-- <div><a href="#"><i class="ion-social-facebook"></i></a><a href="#"><i class="ion-social-instagram"></i><a href="#"><i class="ion-social-linkedin"></i></a></div>      -->
            </div>     
        </div>
    
    </div>

    <div class="row">
        <div class="column text-center footer">
            <p><b>©<?php echo date("Y"); ?> SafeItUp</b></p>
        </div>
    </div>
</div>