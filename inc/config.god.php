<?php

// Php 
date_default_timezone_set('america/Sao_Paulo'); # Time zone
ini_set('display_errors', 0);

// Hashs salts (If players are already registered, changing the salts will invalidate their password !)
# For more secure, change it each salt for random string (between 15 and 25)
define('PASSWORD_SALT', 'ChAnGEItFoRRaNdOm');
define('PASSWORD_SALT2', '2ChAnGEItFoRRaNdOm2');
define('PASSSTAFF_SALT', '3ChAnGEItFoRRaNdOm3');
define('PASSSTAFF_SALT2', '4ChAnGEItFoRRaNdOm4');
	  
// Mail
define('SMTP_HOST', ''); # SMTP Host(Example: smtp.gmail.com for google gmail)
define('SMTP_PORT', '587'); # SMTP Port
define('SMTP_ENCRYPTION', 'tls'); # SMTP Encryption(null/ssl/tls) (Use tls on port 587 for gmail)
define('SMTP_USERNAME', '@'); # SMTP Your mail
define('SMTP_PASSWORD', ''); # SMTP Password
	  
// Configuration
$Holo = array(
'panel'         =>     'housekeeping',
'htmllang'      =>     'pt-br',
'name'          =>     'YOUR HOTEL NAME',
'in_auto_dark'  =>     '18', # Start of night mode in hours(For automatic theme user)
'en_auto_dark'  =>     '6', # End of night mode in hours(For automatic theme user)

// Links
'url'           =>     'http://localhost',
'client_url'    =>     'http://localhost/hotel',
'cameraurl'     =>     'http://swfs.kubbo.city/camera/',
'thumbsurl'     =>     'http://swfs.kubbo.city/camera/thumbnails/',
'avatar'        =>     'https://habbo.city/habbo-imaging/avatarimage?figure=',
'url_badges'    =>     '/nitro/c_images/album1584/',

// Register
'mision'        =>     'EdgeCMS',
'monedas'       =>     '15000',
'duckets'       =>     '5000',
'diamants'      =>     '50',
'gender'        =>     'M',
'look'          =>     'ch-215-82.hr-100-42.lg-270-1408.ha-1003-64.hd-180-1370',

// Social
'contactemail'  =>     'contactmail@your.server',
'facebook'      =>     '',
'twitter'       =>     '',
'discordinvl'   =>     '',
'discordwid'    =>     '',

// Security
'minrank'       =>     '5',                                            # Rank min staff
'minhkr'        =>     '5',                                            # Rank min for access in hk: Login
'maxrank'       =>     '8',                                            # Rank max staff
	
// Security HK	
'hkr_animator'  =>     '5',                                            # Rank min for access in hk: News, news edit, badge create
'hkr_moderator' =>     '6',                                            # Rank min for access in hk: Bans
'hkr_manager'   =>     '7',                                            # Rank min for access in hk: Maintenance, rank, pass create
'hkr_owner'     =>     '8',                                            # Rank min for access in hk: Owner first pass create
	
'recaptcha_on'  =>     'false',
'recaptcha'     =>     ''); # ReCaptcha Key

// CMS page Language
$Lang = array(

// Logo
'logo.tag'           =>     'BETA',

// Menu
'menu.index'         =>     'Início',
'menu.login'         =>     'Entrar',
'menu.loginbutton'   =>     'Entrar na sua Conta',
'menu.register'      =>     'Registrar',
'menu.articles'      =>     'Notícias',
'menu.gallery'       =>     'Galeria',
'menu.famous'        =>     'Famosos',
'menu.team'          =>     'Equipe',
'menu.shop'          =>     'Loja',
'menu.support'       =>     'Suporte',
'menu.hotel'         =>     'Entrar no Hotel',
'menu.myprofile'     =>     'Ver meu Perfil',
'menu.settings'      =>     'Configurações',
'menu.logout'        =>     'Desconectar',
'menu.onlines'       =>     'Onlines no Hotel',
'menu.back'          =>     'Voltar',

// Lyrics
'lyrics.1'           =>     'Crie uma conta agora mesmo.',
'lyrics.2'           =>     'O tempo é apenas uma ilusão.',
'lyrics.3'           =>     'Quando você menos esperar...',
'lyrics.4'           =>     'Chame os seus amigos.',
'lyrics.5'           =>     'Carregando mensagem divertida...',
'lyrics.6'           =>     'Já comeu pudim hoje?',
'lyrics.7'           =>     'Você quer batatas fritas?',
'lyrics.8'           =>     'O que acha que ser rico?',
'lyrics.9'           =>     'Olhe para um lado. Olhe para o outro.',
'lyrics.10'          =>     'Siga o pato amarelo.',
'lyrics.11'          =>     'Eu gosto da sua camiseta.',
'lyrics.12'          =>     'Ganhe lindos emblemas.',
'lyrics.13'          =>     'Carregando o universo de pixels.',
'lyrics.14'          =>     'Seja destaque em nosso Hotel.',
'lyrics.15'          =>     'Não é você, sou eu.',

// Index
'index.titulo'       =>     'Início',
'index.noticias'     =>     'Notícias',
'index.alertnews'    =>     '<b>Atenção!</b> Você consegue ler as nossas notícias, mas para quaisquer interações, você precisa estar conectado(a) em sua conta!',
'index.latestusers'  =>     'Recentemente chegados no '.$Holo['name'].'',
'index.aboutlastusr' =>     '<b>Curiosidade:</b> Aqui você pode conferir os últimos <b>Quinze</b> registrados no '.$Holo['name'].', será que quem você chamou está aqui?',
'index.gallery'      =>     'Galeria de Fotos',
'index.alertphotos'  =>     '<b>Psiu!</b> Quer publicar uma foto ou conferir mais fotos? Conecte em sua conta agora mesmo.',

// Login
'login.titulo'       =>     'Entrar',
'login.username'     =>     'Nome de Usuário(a):',
'login.password'     =>     'Sua Senha:',
'login.human'        =>     'Você é Humano?',
'login.confirm'      =>     'Acessar',
'login.register'     =>     'Criar uma nova Conta',
'login.forgot'       =>     'Esqueceu a sua senha?',
'login.error1'       =>     'Não deixe campos vazios.',
'login.error2'       =>     'Nome de usuário ou senha inválidos.',
'login.error3'       =>     'Você não é um robô? Verifique sua identidade.',

// Forgot
'forgot.titulo'      =>     'Esqueci minha Senha',
'forgot.back'        =>     'Voltar',
'forgot.confirm'     =>     'Pronto',
'forgot.iperror'     =>     'Seu IP é diferente do IP usado para solicitar uma nova senha! Por motivos de segurança, use a mesma conexão de internet(IP) para fazer a solicitação. Se você tem um IP dinâmico, sem sorte, provavelmente mudou nesse meio tempo! Maiores dúvidas ou problemas, entre em <a href="/support">contato com a gente</a>.',
'forgot.error1'      =>     'Alguma coisa de errado aconteceu, tente novamente...',
'forgot.alertlink'   =>     '<p class="alert alert-secondary"><a class="text-inherit" data-toggle="tooltip" title="" data-original-title="Por sua segurança, verifique se o site começa com '.$Holo['url'].'/"><img src="'.$Holo['url'].'/Mawu/image/securlink.png">&ensp;<font color="green"></font>'.$Holo['url'].'/</a></p>',
'forgot.changetitle' =>     'Sua nova Senha',
'forgot.new1'        =>     'Utilize, pelo menos, 6 caracteres. Inclua, pelo menos, uma letra, um número e um caracter especial.',
'forgot.new2'        =>     'Crie uma nova senha:',
'forgot.new3'        =>     'Repita a sua nova senha:',
'forgot.resetmsg1'   =>     'Não deixe os campos vazios.',
'forgot.resetmsg2'   =>     'As novas senhas não coincidem.',
'forgot.resetmsg3'   =>     'Sua senha foi alterada com Sucesso! Aguarde...',
'forgot.resetmsg4'   =>     'Algo deu errado, verifique tudo e tente novamente.',
'forgot.resetmsg5'   =>     'Nome ou Email incorretos, tente novamente.',
'forgot.resetmsg6'   =>     'Alguma coisa deu bem errado, tente novamente e verifique todos os campos.',
'forgot.alsuccess'   =>     'Acabamos de enviar um e-mail com um link para você reestabelecer a sua senha.<br><br><b>IMPORTANTE! Lembre-se de verificar a pasta "lixo" e "correio não desejado".</b>',
'forgot.uremail'     =>     'Nome de usuário da sua conta:',
'forgot.urusern'     =>     'O email da sua conta:',

// Email
'email.text1'        =>     'Olá',
'email.text2'        =>     'Um patinho de borracha nos disse que você precisou mudar a senha da conta '.$Holo['name'].' registrada com o seguinte e-mail:',
'email.text3'        =>     'O link abaixo perderá a validade em 10 minutos, portanto seja rápido!',
'email.text4'        =>     'Clique aqui para mudar a sua senha com segurança',
'email.text5'        =>     'Você não pediu essa mudança? Ok, pedimos desculpas por essa mensagem. Basta ignorá-la e a sua senha atual continuará a mesma!',
'email.text6'        =>     'Confirmação de mudança de senha',

// Register
'register.titulo'    =>     'Criar nova Conta',
'register.yourname'  =>     'Escolha um Nome:',
'register.nameinfo'  =>     'Seu nome pode conter letras maiúsculas, minúsculas, números e caracteres especiais como _-=?!@:.,',
'register.pass'      =>     'Crie uma Senha:',
'register.repass'    =>     'Repita a sua senha:',
'register.passtext'  =>     'Utilize, pelo menos, 6 caracteres. Inclua, pelo menos, uma letra, um número e um caracter especial.',
'register.yourmail'  =>     'Seu E-mail:',
'register.mailtext'  =>     'Você vai precisar deste endereço de e-mail para realizar ações importantes no '.$Holo['name'].'. Por favor, utilize email válido.',
'register.captcha'   =>     'Você é Humano?',
'register.confirm'   =>     'CRIAR NOVA CONTA',
'register.haveone1'  =>     'Já tem uma conta?',
'register.haveone2'  =>     'Entre agora',
'register.error1'    =>     'Algo deu errado, tente novamente e verifique todos os dados.',
'register.error2'    =>     'Ops, nome de usuário já está sendo usado, tente outro.',
'register.error3'    =>     'Ops, e-Mail já está sendo usado, tente outro.',
'register.error4'    =>     'As senhas não são as mesmas, verifique e tente novamente.',
'register.error5'    =>     'Ops, seu nome de usuário é muito curto, tente outro.',
'register.error6'    =>     'Algo de errado está acontecendo com seu nome, tente outro nome.',
'register.error7'    =>     'Você não é um robô? Verifique sua identidade.',

// Me
'me.titulo'          =>     'Início',
'me.rooms'           =>     'Quartos destaques',
'me.roomby'          =>     'Criado por',
'me.roomwith'        =>     'Com',
'me.roomhave'        =>     'Tem',
'me.roomlikes'       =>     'curtidas',
'me.roomusers'       =>     'pessoas nele',
'me.roomtext'        =>     '<b>Confuso?</b> Os seis quartos com mais Curtidas vão sempre aparecer destacados aqui.',
'me.news'            =>     'Notícias',
'me.achievements'    =>     'Com mais Conquistas',
'me.respects'        =>     'Com mais Respeitos',
'me.lastphoto'       =>     'Última foto',
'me.photoby'         =>     'Foto de',
'me.seephotos'       =>     'Ver todas',
'me.achievepoints'   =>     'Pontos de Conquista.',
'me.respectreceived' =>     'Respeitos recebidos.',
'me.respectgiven'    =>     'Respeitos dados.',
'me.yourbadges'      =>     'Alguns dos seus Emblemas',
'me.badgealert'      =>     '<b>Ei!</b> Estamos mostrando apenas <b>6</b> Emblemas, mas você tem atualmente:',
'me.smallbadges'     =>     'emblemas.',
'me.stats'           =>     'Suas estatísticas.',
'me.statsdesc'       =>     'Confira o que você possui no Hotel:.',
'me.stats1'          =>     'Moedas',
'me.stats2'          =>     'Duckets',
'me.stats3'          =>     'Diamantes',
'me.stats4'          =>     'Respeitos',
'me.stats5'          =>     'Emblemas',
'me.stats6'          =>     'Quartos',
'me.stats7'          =>     'Conquistas',

// News
'news.titulo'        =>     'Notícias',
'news.categorys'     =>     'Categorias',
'news.cat1'          =>     'Promoções',
'news.cat2'          =>     'Coisas grátis',
'news.cat3'          =>     'Mobis',
'news.cat4'          =>     ''.$Holo['name'].' Hotel',
'news.cat5'          =>     'Sistema',
'news.cat6'          =>     'AO VIVO',
'news.whatis'        =>     'Que isso?...',
'news.newstext'      =>     'Aqui vai ser mostrado até <b>45</b> Últimas notícias postadas, sejam elas Promoções, Eventos ou Informativos.',
'news.winbadge'      =>     'Ganhe este Emblema',
'news.category'      =>     'Categoria',
'news.have1'         =>     'Existem',
'news.have2'         =>     'notícias nesta categoria.',
'news.comments'      =>     'Comentários',
'news.makecomment'   =>     'Escreva um comentário',
'news.alertcant'     =>     'Não é mais possível fazer comentários nesta notícia',
'news.alertlogin'    =>     'Você precisa <a href="/login">entrar</a> para publicar um comentário.',
'news.confirm'       =>     'Comentar',
'news.alertc1'       =>     '<b>Sucesso!</b> Você deixou o seu comentário.',
'news.alertc2'       =>     'Eita, alguma coisa deu errado, que tal tentar novamente?...',
'news.alertc3'       =>     'Você não pode deixar um comentário aqui...',
'news.alertc4'       =>     'Alguma coisa deu errado com o seu <i>código de segurança</i>, tente reentrar em nosso Hotel.',
'news.alertc5'       =>     'Mantenha o seu comentário sem palavras inadequadas, ou de baixo calão e lembre-se, você só pode fazer <b>3</b> comentários por notícia.',
'news.alertc6'       =>     '<b>EITA!</b> Você está tentando fazer o que não pode, você só pode deixar <b>3</b> comentários Por notícia.',
'form.alertc1'       =>     '<b>Formulário enviado!</b> Obrigado por sua participação.',

// Gallery
'gallery.titulo'     =>     'Galeria',
'gallery.desc'       =>     'Entrar no Hotel e usar a Câmera',
'gallery.whatis'     =>     'Que isso?...',
'gallery.whatdesc'   =>     'As últimas <b>45</b> fotos tiradas e publicadas dentro do Hotel, vão aparecer nesta página, inclusive ver as suas.',
'gallery.aleatorys'  =>     'Foto aleatória',
'gallery.fixed'      =>     'Essa é uma boa foto!',
'gallery.photoby'    =>     'Foto de',
'gallery.moderation' =>     'Moderação:',
'gallery.moddelete'  =>     'Deletar essa foto.',
'gallery.error1'     =>     '<b>Sucesso!</b> A foto foi apagada.',
'gallery.error2'     =>     '<b>Ei:</b> Ou essa foto não existe, ou ela já foi apagada...',
'gallery.error3'     =>     '<b>Ops!</b> O ID dessa foto não é válido.',
'gallery.error4'     =>     '<b>Ops!</b> Seu código de segurança está invalido, cuidado e tente novamente.',
'gallery.timeah'     =>     'Postada há',
'gallery.visual'     =>     'Visualizações',
'gallery.roomby'     =>     'Foto tirada no quarto de',
'gallery.moreof'     =>     'Mais fotos de',

// Famous
'famous.titulo'      =>     'Famosos',
'famous.noshow'      =>     'você não vai aparecer nesta página porque você configurou sua conta para ficar <b>Oculta</b>!',
'famous.morediamonds'=>     'Com mais Diamantes',
'famous.diadesc'     =>     'Essa categoria mostra apenas as <b>Cinco</b> pessoas mais ricos de <font color="#0AA8EC">Diamantes</font> dentro do '.$Holo['name'].' Hotel.',
'famous.diamonds'    =>     'Diamantes',
'famous.moreduckets' =>     'Com mais Duckets',
'famous.duckdesc'    =>     'Essa categoria mostra apenas as <b>Cinco</b> pessoas mais ricos de <font color="#822273">Duckets</font> dentro do '.$Holo['name'].' Hotel.',
'famous.duckets'     =>     'Duckets',
'famous.morecredits' =>     'Com mais Moedas',
'famous.creditdesc'  =>     'Essa categoria mostra apenas as <b>Cinco</b> pessoas mais ricos de <font color="#FF9030">Moedas</font> dentro do '.$Holo['name'].' Hotel.',
'famous.credits'     =>     'Moedas',

// Team
'team.titulo'        =>     'Equipe',
'team.desc'          =>     'Nossos membros atuais',
'team.descinfo'      =>     'A Equipe é feita por membros a partir de Moderação até Criação geral, eles estão aqui dispostos a fazer tudo por vocês e pelo nosso Hotel.',
'team.hide1'         =>     '<b>Ei...</b> Como vimos que você é',
'team.hide2'         =>     'precisamos lhe informar que existem cargos ocultos aqui, sendo eles -',

// Support
'support.titulo'     =>     'Suporte',
'support.alert1'     =>     '<b>Sabia?</b> A ferramenta de Suporte/Ajuda pode se tornar melhor se você estiver logado em uma conta! <a href="/login">Clique aqui para entrar</a>',
'support.alert2'     =>     '<h3>Nosso e-mail</h3><br><b>Eita</b>, como você não está em conexão com nenhuma conta, não podemos te oferecer muitos recursos no quesito <i>Ajuda/Suporte</i>, mas podemos ser bem paciente e atenciosos com você caso queira nos mandar um e-mail, nosso endereço de e-mail para suporte é - <b>'.$Holo['contactemail'].'</b>, as respostas podem demorar até 24h.',
'support.alert2desc' =>     '(Você pode utilizar o e-mail para informar algum erro no sistema, alguma sugestão ou tentar entrar em ação contra ou a favor de um banimento)',
'support.alert3'     =>     '<h3>Outras formas de solicitar ajuda</h3><br>Se caso você não consiga ou ache muito difícil nos contatar via e-mail, temos também um grupo no aplicativo <b>Discord</b>, la sim você pode achar outros usuários e até mesmo conseguir ajuda de forma instantânea.<br><br><a href="'.$Holo['discordinvl'].'" target="_blank" class="btn btn-primary">Entrar no grupo do Discord</a>',
'support.send'       =>     'Enviar um Ticket',
'support.form1'      =>     'Nome de usuário:',
'support.form2'      =>     'Categoria:',
'support.form3'      =>     'Conte o que acontece:',
'support.form4'      =>     'Enviar Ticket',
'support.catdesc'    =>     'Escolha uma categoria...',
'support.cat1'       =>     'Ajuda & Suporte',
'support.cat2'       =>     'Reclamações',
'support.cat3'       =>     'Erros & Bugs',
'support.cat4'       =>     'Sugestões',
'support.cat5'       =>     'Quero entrar em Contato',
'support.username'   =>     'Não é possível alterar nomes de usuário.',
'support.desc5'      =>     'Seja bem claro no que for digitar, em caso de abuso do sistema, você será permanentemente banido.',

// Maintenance
'maintenance.text1'  =>     '<b>ATENÇÃO!</b> '.$Holo['name'].' Hotel está temporariamente fechado para Manutenções, o motivo seria -',
'maintenance.text2'  =>     'Tentaremos voltar o mais rápido possível, prometemos!...',

// Banned
'banned.titulo'      =>     'Banimento',
'banned.youreban'    =>     'A sua conta está banida do '.$Holo['name'].'.',
'banned.text1'       =>     'Sua conta está banida até',
'banned.text2'       =>     'de',
'banned.text3'       =>     'pelo motivo:',
'banned.button'      =>     'Atualizar Página',

// Error
'error.titulo'       =>     'Erro',
'error.erro1'        =>     'Página não encontrada',
'error.erro2'        =>     'O link pode estar quebrado ou a página pode ter sido removida. Verifique se o link que você está tentando abrir está correto.',
'error.erro3'        =>     'Voltar a página inicial',
'error.erro4'        =>     'Voltar aonde estava',

// Footer
'footer.allrights'   =>     'Todos direitos reservados.',
'footer.devby'       =>     'Site desenvolvido por Brytch',
'footer.text'        =>     'Este site não está afiliada com, patrocinada por, apoiada por, ou principalmente aprovada pela Sulake Oy ou suas empresas Afiliadas, '.$Holo['name'].' pode utilizar as marcas registradas e outras propriedades intelectuais do Habbo, que estão permitidas sob a Política de Fã Sites Habbo.',

);
	
?>
