
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
    
            <form action="<?php echo get_template_directory_uri() ?>/sendmail.php" method="post"> 

            <p v-if="errors.length">
                <b>Något gick snett</b>
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
                        <input  v-bind:class=" { error: errorName} " id="fullname" type="text" v-model="name"  name="name">                    
                    </div>
                    <div>
                        <label for="email">E-mail</label>                        
                        <input v-bind:class=" { error: errorEmail} " id="email" type="text" name="email" v-model="email">
                    </div>
                    <div>
                        <label for="phone">Telefonnummer</label>                        
                        <input  v-bind:class=" { error: errorPhone} " id="phone" type="text" name="phone" v-model="phone">                          
                    </div>
                </div>
                <label for="message">Ditt meddelnade</label>                
                <textarea v-bind:class=" { error: errorMessage} " name="message" id="message" cols="15" rows="5" v-model="message" ></textarea>         
                <input  type="submit" class="button" v-bind:class="{ disabled: name == '' || email == '' || phone == '' || message == '' && !success}" v-on:click="checkForm" value="Skicka" name="submit">
            </form>
        </div>
        <div class="column contact-info small-12 medium-6 large-5">
                <div>
                    <?php if(!empty($address)) : ?>
                <div class="address">
                    <i class="ion-ios-location"></i>
                    <div>
                        <p>
                            <?php  echo $address ?><br>
                            <?php  echo $postal_code ?>
                            <?php  echo $city ?>
                         </p>
                    </div>
                </div>            
                <?php endif; ?>
                <?php if(!empty($phone)) : ?>
                    <div class="phone-number"><a href="tel:<? echo $phone?>"> <i class="ion-ios-telephone"></i><span> <? echo substr($phone, 0 , 4) . " - " . substr($phone, 4, 2) . " " . substr($phone, 6, 2) . " " . substr($phone, 8); ?></span></a></div>
                <?php endif; ?>

                <?php if(!empty($email)) : ?>
                    <div class="mail"><a href="mailto:<? echo $email ?>"><i class="ion-android-mail"></i><span><? echo $email ?></span></a></div>
                <?php endif; ?>
            </div>     
        </div>
    
    </div>
</div>