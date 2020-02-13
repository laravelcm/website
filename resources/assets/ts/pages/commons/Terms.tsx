import * as React from "react";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

const Terms = () => (
  <>
    <Seo title="Condiditions d'utilisation" />
    <div className="container mt-10 md:mt-18">
      <div className="w-full md:w-2/3 mx-auto">
        <h1 className="text-gray-800 text-xl md:text-3xl lg:text-4xl font-semibold mb-10 md:mb-12 text-center">
            Condiditions d'utilisation
        </h1>
        <div className="text-gray-600 space-y-8 content font-light">
          <div className="space-y-4">
            <p>
                Les présentes conditions générales d'utilisation du site Web
                écrites sur cette page Web géreront votre utilisation de notre
                site Web, Laravel Cameroun accessible à laravelcm.com.
            </p>
            <p>
                Ces conditions seront pleinement appliquées et affecteront votre
                utilisation de ce site Web. En utilisant ce site Web, vous avez
                accepté d'accepter toutes les modalités et conditions écrites
                ici. Vous ne devez pas utiliser ce site Web si vous n'êtes pas
                d'accord avec l'une de ces conditions générales standard du site
                Web. Les éléments contenus dans ce site Web sont protégés par le
                droit d'auteur et la loi sur les marques applicables.
            </p>
          </div>
          <div>
            <h3>Droits de propriété intellectuelle</h3>
            <p className="mb-4">
                Outre le contenu que vous possédez, en vertu des présentes
                Conditions, Laravel Cameroun et / ou ses concédants de licence
                détiennent tous les droits de propriété intellectuelle et les
                matériaux contenus dans ce site Web.
            </p>
            <p>
                Vous disposez d'une licence limitée uniquement aux fins de
                visualisation du contenu de ce site Web.
            </p>
          </div>
          <div>
            <h3>Votre contenu</h3>
            <p className="mb-4">
                Dans les présentes conditions générales du site Web, «votre
                contenu» signifie tout audio, texte vidéo, images ou autre
                matériel que vous choisissez d'afficher sur ce site Web. En
                affichant Votre Contenu, vous accordez à Laravel Cameroun une
                licence non exclusive, irrévocable et sous licence mondiale pour
                l'utiliser, la reproduire, l'adapter, la publier, la traduire et
                la distribuer sur tous les supports.
            </p>
            <p>
                Votre contenu doit être le vôtre et ne doit pas empiéter sur les
                droits de tiers. Laravel Cameroun se réserve le droit de
                supprimer tout contenu de ce site Web à tout moment sans
                préavis.
            </p>
          </div>
          <div>
            <h3>Limitations</h3>
            <p>
                En aucun cas, Laravel Cameroun, ni aucun de ses dirigeants,
                administrateurs et employés, ne sera tenu responsable de tout ce
                qui découle de ou de quelque manière que ce soit lié à votre
                utilisation de ce site Web, que cette responsabilité soit
                contractuelle. Laravel Cameroun, y compris ses dirigeants,
                administrateurs et employés, ne pourra être tenu responsable de
                toute responsabilité indirecte, consécutive ou spéciale
                découlant de ou liée de quelque manière que ce soit à votre
                utilisation de ce site Web.
            </p>
          </div>
          <div>
            <h3>Indemnité</h3>
            <p>
                Par la présente, vous indemnisez Laravel Cameroun dans toute la
                mesure de et contre toute responsabilité, les coûts, les
                demandes, les causes d'action, les dommages et dépenses
                découlant de quelque manière que ce soit de votre violation de
                l'une des dispositions des présentes Conditions.
            </p>
          </div>
          <div>
            <h3>Modifications des termes</h3>
            <p>
                Laravel Cameroun est autorisé à réviser ces conditions à tout
                moment comme bon lui semble, et en utilisant ce site Web, vous
                êtes censé revoir ces conditions régulièrement.
            </p>
          </div>
          <div>
            <h3>Affectation</h3>
            <p>
                Le Laravel Cameroun est autorisé à céder, transférer et
                sous-traiter ses droits et / ou obligations en vertu des
                présentes Conditions sans aucune notification. Cependant, vous
                n'êtes pas autorisé à céder, transférer ou sous-traiter aucun de
                vos droits et / ou obligations en vertu des présentes
                Conditions.
            </p>
          </div>
          <div>
            <h3>Juridiction</h3>
            <p>
                Ces conditions seront régies et interprétées conformément aux
                lois de l'État du Cameroun, et vous vous soumettez à la
                juridiction non exclusive des tribunaux d'État et fédéraux
                situés au Cameroun pour la résolution de tout litige.
            </p>
          </div>
        </div>
      </div>
    </div>
  </>
);

Terms.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Terms;
