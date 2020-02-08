import * as React from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

const Privacy = () => {
  return (
    <>
      <Seo title="Politique de confidentialité" />
      <div className="container mt-10 md:mt-18">
        <div className="w-full md:w-2/3 mx-auto">
          <h1 className="text-gray-800 text-xl md:text-3xl lg:text-4xl font-semibold mb-10 md:mb-12 text-center">Politique de confidentialité</h1>
          <div className="text-gray-600 space-y-8 content font-light">
            <div className="space-y-4">
              <p>
                Cette page est utilisée pour informer les visiteurs du site Web de nos politiques concernant la collecte,
                l'utilisation et la divulgation des informations personnelles si quelqu'un décide d'utiliser notre service,
                le site Web de Laravel Cameroun.
              </p>
              <p>
                Si vous choisissez d'utiliser notre Service, vous acceptez la collecte et l'utilisation d'informations en
                relation avec cette politique. Les informations personnelles que nous collectons sont utilisées pour fournir
                et améliorer le service. Nous n'utiliserons ni ne partagerons vos informations avec personne, sauf comme décrit
                dans la présente politique de confidentialité.
              </p>
            </div>
            <div>
              <h3>Collecte, utilisation et partage des informations</h3>
              <p>
                Pour une meilleure expérience lors de l'utilisation de notre service, nous pouvons vous demander de nous
                fournir certaines informations personnellement identifiables, y compris, mais sans s'y limiter, votre nom,
                numéro de téléphone et adresse postale. Les informations que nous collectons seront utilisées pour vous contacter
                ou vous identifier.
              </p>
            </div>
            <div>
              <h3>Cookies</h3>
              <p className="mb-4">
                Les cookies sont des fichiers contenant une petite quantité de données qui sont couramment utilisés comme identifiant
                unique anonyme. Celles-ci sont envoyées à votre navigateur à partir du site Web que vous visitez et sont stockées sur
                le disque dur de votre ordinateur.
              </p>
              <p>
                Notre site Web utilise ces «cookies» pour collecter des informations et améliorer notre service. Vous avez la
                possibilité d'accepter ou de refuser ces cookies et de savoir quand un cookie est envoyé à votre ordinateur.
                Si vous choisissez de refuser nos cookies, vous ne pourrez peut-être pas utiliser certaines parties de notre service.
              </p>
            </div>
            <div>
              <h3>Sécurité</h3>
              <p>
                Nous apprécions votre confiance en nous fournissant vos informations personnelles, nous nous efforçons donc d'utiliser
                des moyens commercialement acceptables pour les protéger. Mais rappelez-vous qu'aucune méthode de transmission sur Internet
                ou méthode de stockage électronique n'est sûre et fiable à 100%, et nous ne pouvons garantir sa sécurité absolue.
              </p>
            </div>
            <div>
              <h3>Création de compte</h3>
              <p>
                Pour utiliser ce site Web, un utilisateur doit d'abord remplir le formulaire d'inscription. Lors de l'inscription, un utilisateur
                est tenu de fournir certaines informations (telles que le nom et l'adresse e-mail). Ces informations sont utilisées pour vous
                contacter au sujet des produits / services sur notre site pour lesquels vous avez manifesté votre intérêt. À votre choix, vous
                pouvez également fournir des informations démographiques (telles que le sexe ou liens vers vos comptes sociaux) vous concernant,
                mais elles ne sont pas obligatoires.
              </p>
            </div>
            <div>
              <h3>Contenu vers d'autres sites</h3>
              <p>
                Notre service peut contenir des liens vers d'autres sites. Si vous cliquez sur un lien tiers, vous serez dirigé vers ce site.
                Notez que ces sites externes ne sont pas exploités par nous. Par conséquent, nous vous conseillons fortement de consulter la
                politique de confidentialité de ces sites Web. Nous n'avons aucun contrôle sur, et n'assumons aucune responsabilité pour le
                contenu, les politiques de confidentialité ou les pratiques de tout site ou service tiers.
              </p>
            </div>
            <div>
              <h3>Mise à jour</h3>
              <p className="mb-4">
                Nous pouvons mettre à jour notre politique de confidentialité de temps en temps. Ainsi, nous vous conseillons de consulter
                régulièrement cette page pour tout changement. Nous vous informerons de tout changement en publiant la nouvelle politique de
                confidentialité sur cette page. Ces modifications prennent effet immédiatement après leur publication sur cette page.
              </p>
            </div>
            <div>
              <h3>Contact</h3>
              <p>
                Si vous pensez que nous ne respectons pas cette politique de confidentialité, vous devez nous contacter immédiatement
                par e-mail à help@laravelcm.com.
              </p>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

Privacy.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Privacy;
