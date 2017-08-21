       <div id="main_container">
            <?php echo $this->element('header');?>
            <section id="about">
                <div class="content">
                    <h2>¿Qu&eacute; es Canasta Rosa?</h2>
                    <h3>Canasta Rosa es una plataforma digital que conecta inspiración e ideas con productos únicos.<br>Forma parte de nuestra comunidad e <span>Inspirate</span>, <span>Crea</span> y <span>Vende</span>.</h3>
                </div>
            </section>
            <section id="features">
                <div class="content">
                    <h2>¿Por qu&eacute; unirme a Canasta Rosa?</h2>
                    <ul class="features_list">
                        <li class="inspire">
                            <div class="icon"></div>
                            <h4>Alcanza a millones de usuarios</h4>
                            <p>Exp&oacute;n tu negocio a millones de usuarios y deja que descubran tus productos mientras exploran nuestra tienda, original contenido y redes sociales.</p>
                        </li>
                        <li class="buy">
                            <div class="icon"></div>
                            <h4>Pagos f&aacute;ciles y seguros</h4>
                            <p>Cierra m&aacute;s ventas recibiendo pagos con tarjeta de cr&eacute;dito/debito, paypal, transferencias y dep&oacute;sitos. Asegura tu pago antes de elaborar tus productos.</p>
                        </li>
                        <li class="sell">
                            <div class="icon"></div>
                            <h4>Env&iacute;os r&aacute;pidos y confiables</h4>
                            <p>Expande tu negocio enviando tus productos de forma r&aacute;pida y segura. Conoce detalles de tu env&iacute;o como rastreo, hora de entrega y aprovecha tarifas preferenciales.</p>
                        </li>
                    </ul>
                </div>
            </section>
            <section id="invite">
                <div class="content">
                    <div class="icon"></div>
                    <h3>Invita a tus amigos creadores y artesanos</h3>
                    <h4>¿Tienes o conoces a alguien con productos e ideas incre&iacute;bles?</h4>
                    <p>Ustedes pueden crecer su negocio y formar parte de una de las plataformas que impulsan la creatividad m&aacute;s grandes de Latino Am&eacute;rica.</p>
                    <ul class="socialNetworks">
                        <li class="facebook">
                            <a href="javascript:window.SocialShare('facebook', 'http://www.canastarosa.com/');">Comp&aacute;rtelo en Facebook</a>
                        </li>
                        <li class="whatsapp"><a href="whatsapp://send?text=http://canastarosa.com">Whatsapp</a></li>
                        <li class="mail"><a data-src="#mailForm" href="javascript:shareWindow.openWindow();">Env&iacute;ales un Email</a></li>
                    </ul>
                </div>
            </section>
            <div id="invite_fixed">
                <h4>Invita a tus amigos al lanzamiento</h4>
                <ul class="socialNetworks">
                    <li class="facebook"><a href="javascript:window.SocialShare('facebook', 'http://www.canastarosa.com/');">Facebook</a></li>
                    <li class="whatsapp"><a href="whatsapp://send?text=http://canastarosa.com">Whatsapp</a></li>
                    <li class="mail"><a data-src="#mailForm" href="javascript:shareWindow.openWindow();">Email</a></li>
                    
                </ul>
            </div>
            <footer>
                <ul id="gallery">
                    <li>
                        <img src="images/gallery3.png" alt="#">
                    </li>
                    <li>
                        <img src="images/gallery2.png" alt="#">
                    </li>
                    <li><img src="images/gallery1.jpg" alt="#"></li>
                    <li><img src="images/gallery0.png" alt="#"></li>
                </ul>
                <div class="content">Canasta Rosa™ 2017 . <a href="mailto:info@canastarosa.com">info@canastarosa.com</a></div>
            </footer>
            <div id="registerForm" class="modalForm">
                <div class="icon"></div>
                <h3>¡Bienvenido@ a Canasta Rosa!</h3>
                <p>Est&aacute;s a 2 pasos de formar parte de nuestra comunidad.</p>
                <nav class="register_step"><span class="active"></span> <span></span>
                </nav>
                <form action="/users/add" method="POST" id="register_form" onsubmit="return RegisterForm.submit()">
                    <div class="slider_container">
                        <div class="slider">
                            <fieldset class="step1">
                                <div class="data_holder">
                                    <h4>¿Qu&eacute; te gusta hacer y vender?</h4>
                                    <div class="options_container">
                                        <ul class="category_list"></ul>
                                    </div>
                                    <div class="categories">
                                        <?php foreach ($category as $cat) { ?>
                                        <label>
                                            <input class="chk" type="checkbox" name="category_sct[]" value="<?php echo $cat['id'];?>"><?php echo $cat['title'];?>
                                        </label>
                                       
                                        <?php } ?>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="step2">
                                <h4>Asiste a eventos especiales exclusivos de nuestro lanzamiento</h4>
                                <div class="data_holder"><input type="text" id="inputName" name="name_txt" value="" placeholder="Nombre Completo*"></div>
                                <div class="data_holder"><input type="text" id="inputEmail"  name="email_txt" value="" placeholder="Email*"></div>
                                <div class="data_holder"><input type="text" id="inputCode" name="zip_txt" value="" placeholder="C&oacute;digo Postal*"></div>
                                <div class="data_holder"><input type="text" id="inputPhone" name="phone_txt" value="" placeholder="Tel&eacute;fono"></div>
                                <input type="submit" name="submit_btn" value="Registrarme">
                            </fieldset>
                        </div>
                    </div>
                   
                    <div class="submit_container">
                        <a href="#" class="nav">Siguiente</a>                         
                    </div>
                </form>
            </div>
            <div id="mailForm" class="modalForm">
                <h3>Invita a tus amigos creadores y artesanos</h3>
                <p>Corre la voz, forma parte de la comunidad y disfruta de todos los beneficios de formar parte del pre-lanzamiento.</p>
                <form action="#" method="POST" id="invite_form" onsubmit="return InviteForm.submit()">
                    <fieldset>
                        <div class="data_holder">
                            <input type="text" id="M_email" name="email_txt" value="" placeholder="Email de tus amigos">
                        </div>
                        <div class="data_holder">
                            <textarea name="message_txt"  id="Message" cols="30" rows="9">¿Conoces Canasta Rosa?&#013;Es la plataforma digital que conecta inspiración con productos únicos y originales.&#010;&#013;Registrate para formar parte de su lanzamiento exclusivo y recibe invitaciones a eventos, tutoriales y grupos para poder vender tus creaciones.
                            </textarea>
                        </div>
                        <div class="data_holder">
                            <input type="submit" name="submit_btn" value="Enviar">Sumbit</div>
                    </fieldset>
                </form>
            </div>
            
        </div>
        <script src="/canastaroca/js/custom.js"></script>
        
        
       
        
        