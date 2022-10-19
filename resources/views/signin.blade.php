
<div class='formulaire'>
<form action='signinT' method='post'>
@csrf
<input type='text' name='id' id='id' placeholder='Identifiant' required='required' class='formtxt'/>

<input type='email' name='mail' id='mail' placeholder='email'  required='required' class='formtxt'/>

<input type='password' name='mdp' id='mdp2' placeholder='Mot de passe'  required='required' class='formtxt'/>
<input type='password' name='mdpC' id='mdp' placeholder='Confirmation Mot de passe'  required='required'class='formtxt'/>

<input type='submit' value='S&rsquo;enregistrer' id='enregister'/>

<div class='changeP'>
<span>Vous avez deja un compte ? </span>
<a href='login'> Vous connecter </a>
</div>
</form>

</div>
