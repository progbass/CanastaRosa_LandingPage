
    <div id="main_container">
        <?php echo $this->element('header');?>
        <section id="about">
            <div class="content">
                <h2>¿Qu&eacute; es Canasta Rosa?</h2>
                <h3>Canasta Rosa es una plataforma digital que apoya e impulsa los bienes y servicios creativos &uacute;nicos.</h3>
                <p>S&oacute;mos un mercado digital donde puedes encontrar inspiraci&oacute;n para <strong>crear</strong>, <strong>comprar</strong> y <strong>vender</strong> todo tipo de productos, servicios e ideas de manera confiable y segura.<br>Aqu&iacute;, podr&aacute;s promover y vender todas tus creaciones, desde <span>diseño</span>, <span>productos vintage</span>, <span>artesan&iacute;as</span>, <span>manualidades</span>, hasta <span>ropa</span>, <span>comida</span> y <span>¡mucho mas!</span></p></div></section><section id="features">
                    <div class="content"><h2>¿Por qu&eacute; unirme a Canasta Rosa?</h2><ul class="features_list">
                            <li class="inspire">
                                <div class="icon">
                                    
                                </div>
                                <h4>¡Insp&iacute;rate!<br>Expande tu Negocio</h4><p>Encuentra art&iacute;culos, tutoriales y cientos de tips que te ayudar&aacute;n a comenzar tu negocio o expandir el alcance de tu empresa.</p></li><li class="buy"><div class="icon"></div><h4>Compra productos &uacute;nicos,<br>aut&eacute;nticos y originales.</h4><p>Compra y recibe originales productos de manera confiable y segura. Tu pago será liberado hasta que recibas y est&eacute;s satisfecho con tu pedido.</p></li><li class="sell"><div class="icon"></div><h4>Vende y env&iacute;a tus creaciones<br>de forma r&aacute;pida y segura</h4><p>Exhibe tus productos a una comunidad global. Recibe pagos y haz env&iacute;os sin preocupaciones y crece tu negocio bajo tus propios t&eacute;rminos.</p></li></ul></div></section><section id="inspire"><div class="content"><h2>Descubre art&iacute;culos, tutoriales y colecciona las cosas que te inspiran.</h2><p>Encuentra originales y exclusivos art&iacute;culos, tutoriales y contenido &uacute;nico que nuestros los expertos actualizan regularmente.<br>Colecciona y ten f&aacute;cil acceso a las ideas que m&aacute;s te inspiran a trav&eacute;s de nuestras amigables herramientas.</p></div><div class="photo_container"></div></section><section id="responsive"><div class="photo_container"><div class="desktop"></div><div class="mobile"></div></div>
            <div class="content">
                <h2>Compra y vende desde tu Desktop y M&oacute;vil</h2>
                <p>Encuentra el regalo perfecto o administra tu tienda cuando quieras, donde quieras.</p>
                <p>Compra tus art&iacute;culos favoritos y vende tus productos desde tu m&oacute;vil o laptop sin preocupaciones.<br></p>
            </div>
        </section>
        <section id="register">
            <div class="content"><h2>Ent&eacute;rate de nuestro exclusivo lanzamiento</h2>
                <p>Forma parte de esta gran comunidad de creadores y artesanos antes de su lanzamiento. Reg&iacute;strate gratis y recibe invitaciones a eventos y beneficios &uacute;nicos para comenzar a vender tus productos lo m&aacute;s pronto posible.</p>
                <a data-fancybox data-src="#registerForm" href="javascript:;">Registrarme Gratis</a></div>
        </section>
        <section id="invite">
            <div class="content">
                <div class="icon"></div>
                <h3>Invita a tus amigos creadores y artesanos</h3>
                <h4>¿Tienes o conoces a alguien con productos e ideas incre&iacute;bles?</h4>
                <p>Ustedes pueden crecer su negocio y formar parte de una de las plataformas que impulsan la creatividad m&aacute;s grandes de Latino Am&eacute;rica.</p>
                <ul class="socialNetworks">
                    <li>
                        <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=https://www.facebook.com/lacanastarosa/&amp;p[images][0]=http://i.stack.imgur.com/jAH7T.png&amp;p[title]=Canasta Rosa&amp;p[summary]=Canasta Rosa es una plataforma digital que conecta inspiraci�n e ideas con productos �nicos. Forma parte de nuestra comunidad y Insp�rate, Crea y Vende.
" class="facebook">Comp&aacute;rtelo en Facebook</a>
                    </li>
                    <li>
                        <a data-fancybox data-src="#mailForm" href="javascript:;" class="mail">Env&iacute;ales un Email</a>
                    </li>
                </ul>
            </div>
        </section>
        <footer>
            <ul id="gallery">
                <li><img src="/canastaroca/images/gallery3.jpg" alt="#"></li>
                <li><img src="/canastaroca/images/gallery2.jpg" alt="#"></li>
                <li><img src="/canastaroca/images/gallery1.jpg" alt="#"></li>
                <li><img src="/canastaroca/images/gallery0.jpg" alt="#"></li>
            </ul>
            <div class="content">Canasta Rosa™ 2017 . <a href="mailto:info@canastarosa.com">info@canastarosa.com</a></div>
        </footer>
        <div id="registerForm">
            <form action="/canastaroca/users/contact" method="POST" id="register_form">
                <fieldset>
                    <div class="data_holder"><input type="text" name="name_txt" value="" placeholder="Nombre Completo"></div>
                    <div class="data_holder"><input type="email" name="email_txt" value="" placeholder="Email"></div>
                    <div class="data_holder"><input type="text" name="zip_txt" value="" placeholder="C&oacute;digo Postal"></div>
                    <div class="data_holder">
                        <select name="category_sct">
                            <option value="">&Aacute;reas de Inter&eacute;s</option>
                            <option value="artesanias">Artesanias</option>
                            <option value="comida">Comida</option>
                            <option value="fiestas">Fiestas</option>
                            <option value="manualidades">Manualidades</option>
                            <option value="arte">Arte</option>
                            <option value="joyer&iacute;a">Joyer&iacute;a</option>
                            <option value="ropa">Ropa</option>
                            <option value="regalos">Regalos</option>
                        </select>
                    </div>
                    <div class="data_holder"><input type="submit" name="submit_btn" value="Registrarme"></div>
                </fieldset>
            </form>
        </div>
        <div id="mailForm">
            <form action="/canastaroca/users/invitefrnd" method="POST" id="mail_form">
                <fieldset>
                    <div class="data_holder"><input type="text" name="name_txt" value="" placeholder="Nombre Completo"></div>
                    <div class="data_holder"><input type="text" name="email_txt" value="" placeholder="Email"></div>
                    <div class="data_holder"><textarea name="message_txt" ols="30" rows="10"></textarea></div>
                    <div class="data_holder"><input type="submit" name="submit_btn" value="Enviar"></div>
                </fieldset>
            </form>
        </div>
    </div>