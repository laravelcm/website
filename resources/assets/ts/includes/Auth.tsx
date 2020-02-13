import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

interface LayoutProps {
  child: React.ReactNode;
  description?: string;
}

export default ({ child, description }: LayoutProps) => {
  const summary = description
    || `Accédez à des articles, des tutoriels, et au forum. Connectez-vous à votre compte pour accéder
                                  à plusieurs ressources pour les développeurs. Vous pouvez également gagner des lots et surprises
                                  en débloquant des badges et en rejoignant la communauté.`;
  return (
    <div className="flex overflow-hidden">
      <div className="hidden lg:flex flex-col bg-white px-6 pt-15 pb-20 justify-between relative w-140 shadow-md">
        <InertiaLink href="/" className="text-brand-primary flex items-center">
          <svg
            className="text-brand-primary"
            width="59"
            height="38"
            viewBox="0 0 59 38"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M58.9657 18.1341C58.9301 18.0216 58.8708 17.9092 58.7995 17.808L51.5568 9.25229C51.3312 8.9937 50.975 8.88128 50.6426 8.94873L42.2719 10.815C41.9751 10.8825 41.7376 11.0849 41.6307 11.3434C41.5239 11.6133 41.5595 11.9168 41.7376 12.1417L47.7099 20.1128L35.8009 23.1821L29.8287 24.7336L28.4276 22.5075L14.429 0.415485C14.239 0.123173 13.8947 -0.0454672 13.5266 0.0107466L0.786606 1.6297C0.489773 1.66343 0.240434 1.84332 0.0979547 2.09066C-0.0326516 2.338 -0.0326516 2.64155 0.0979547 2.88889L5.74964 12.9624L15.0939 29.6129C15.2958 29.9727 15.7232 30.1413 16.1388 30.0401L28.9738 26.7348L35.8484 37.584C36.0147 37.8538 36.3115 38 36.6321 38C36.7271 38 36.8339 37.9888 36.9289 37.955L56.9117 31.3331C57.1847 31.2431 57.3866 31.0407 57.4816 30.7822C57.5647 30.5236 57.5172 30.2425 57.3628 30.0176L50.8919 21.3945L50.7019 21.1471L54.7032 20.1128L58.3246 19.1796C58.6214 19.1009 58.8589 18.8873 58.9539 18.6175C59.0132 18.4601 59.0132 18.2915 58.9657 18.1341ZM16.3644 28.1963L9.20477 15.4358L2.31826 3.16996L13.1823 1.7871L26.0292 22.0803L28.0002 25.2058L16.3644 28.1963ZM55.1663 30.0851L37.0239 36.1L30.8023 26.2626L44.6465 22.6986L48.8259 21.6193L49.0159 21.8667L55.1663 30.0851ZM49.5858 19.6406L44.0054 12.1979L50.5001 10.7476L56.5198 17.8642L49.5858 19.6406Z" />
          </svg>
          <h4 className="ml-2 text-2xl">Laravel Cameroun</h4>
        </InertiaLink>
        <img
          src={require("@/assets/images/illustration.svg")}
          alt="illustration"
        />
        <p className="text-xs text-gray-500">{summary}</p>
      </div>
      <main className="h-screen w-full p-10 flex flex-col justify-between overflow-hidden overflow-y-scroll">
        {child}
        <div className="flex justify-between">
          <p className="text-xs text-gray-600">
            © 2018 - {new Date().getFullYear()} Laravel Cameroun
          </p>
          <p className="flex space-x-1 text-xs">
            <InertiaLink href="/privacy" className="link">
              Confidentialité
            </InertiaLink>
            <span className="text-brand-primary">-</span>
            <InertiaLink href="/terms" className="link">
              Conditions d'utilisation
            </InertiaLink>
          </p>
        </div>
      </main>
    </div>
  );
};
