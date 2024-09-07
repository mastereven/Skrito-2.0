 <?php
    $errorClasses['last_name'] = 'nom invalide';
    ?>
 <?php
    if (!empty($errorClasses['last_name'])) {
        $authClassMode = 'error';
    } else {
        $authClassMode = '';
    }
    ?>
 <label for="last_name" class=<? $AuthMode ?>
     Nom :
     <?php if (!empty($errorClasses['last_name'])): ?>
     <span class="error"><?= htmlspecialchars($errorClasses['last_name']) ?></span>
 <?php endif; ?>
 </label>

 <?php
    if (!empty($errorClasses['first_name'])) {
        $authClassMode = 'error';
    } else {
        $authClassMode = '';
    }
    ?>
 <label for="first_name" class=<? $AuthMode ?>
     Prénom :
     <?php if (!empty($errorClasses['first_name'])): ?>
     <span class="error"><?= htmlspecialchars($errorClasses['first_name']) ?></span>
 <?php endif; ?>
 </label>

 <?php
    if (!empty($errorClasses['mail'])) {
        $authClassMode = 'error';
    } else {
        $authClassMode = '';
    }
    ?>
 <label for="mail" class=<? $AuthMode ?>
     Email :
     <?php if (!empty($errorClasses['mail'])): ?>
     <span class="error"><?= htmlspecialchars($errorClasses['mail']) ?></span>
 <?php endif; ?>
 </label>

 <?php
    if (!empty($errorClasses['pseudo'])) {
        $authClassMode = 'error';
    } else {
        $authClassMode = '';
    }
    ?>
 <label for="pseudo" class=<? $AuthMode ?>
     Pseudo :
     <?php if (!empty($errorClasses['pseudo'])): ?>
     <span class="error"><?= htmlspecialchars($errorClasses['pseudo']) ?></span>
 <?php endif; ?>
 </label>

 <?php
    if (!empty($errorClasses['password'])) {
        $authClassMode = 'error';
    } else {
        $authClassMode = '';
    }
    ?>
 <label for="password" class=<? $AuthMode ?>
     Mot de passe :
     <?php if (!empty($errorClasses['password'])): ?>
     <span class="error"><?= htmlspecialchars($errorClasses['password']) ?></span>
 <?php endif; ?>
 </label>

 <?php
    if (!empty($errorClasses['password'])) {
        $authClassMode = 'error';
    } else {
        $authClassMode = '';
    }
    ?>
 <label for="password" class=<? $AuthMode ?>
     Confirmer le mot de passe :
     <?php if (!empty($errorClasses['password'])): ?>
     <span class="error"><?= htmlspecialchars($errorClasses['password']) ?></span>
 <?php endif; ?>
 </label>







 <style>
     @keyframes shake {
         0% {
             transform: translate(1px, 1px) rotate(0deg);
         }

         10% {
             transform: translate(-1px, -2px) rotate(-1deg);
         }

         20% {
             transform: translate(-3px, 0px) rotate(1deg);
         }

         30% {
             transform: translate(3px, 2px) rotate(0deg);
         }

         40% {
             transform: translate(1px, -1px) rotate(1deg);
         }

         50% {
             transform: translate(-1px, 2px) rotate(-1deg);
         }

         60% {
             transform: translate(-3px, 1px) rotate(0deg);
         }

         70% {
             transform: translate(3px, 1px) rotate(-1deg);
         }

         80% {
             transform: translate(-1px, -1px) rotate(1deg);
         }

         90% {
             transform: translate(1px, 2px) rotate(0deg);
         }

         100% {
             transform: translate(1px, -2px) rotate(-1deg);
         }
     }

     .error {
         color: red;
         font-style: italic;
         display: inline-block;
         animation: shake 0.5s;
         /* Durée de l'animation */
     }
 </style>