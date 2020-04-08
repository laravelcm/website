import React, { useState } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import { User } from "@/utils/types";

export default () => {
  const [isOpen, setIsOpen] = useState(false);
  const { auth: { user } } = usePage();
  const {
    picture,
    email,
    full_name,
    is_admin,
    username,
  }: User = user;

  return (
    <div className="relative">
      <button
        onClick={() => setIsOpen(!isOpen)}
        className="block h-10 w-10 rounded-full border-2 border-gray-200 overflow-hidden relative z-10"
      >
        <img
          src={picture}
          alt="profile"
          className="h-full w-full object-cover"
        />
      </button>
      <button
        onClick={() => setIsOpen(false)}
        className={`fixed w-full h-full inset-0 bg-transparent cursor-default ${
          isOpen ? "" : "hidden"
        }`}
        tabIndex={-1}
        aria-label="Menu"
      />
      <div
        className={`absolute rounded bg-white w-60 shadow-lg overflow-hidden mt-2 ${
          isOpen ? "" : "hidden"
        }`}
        style={{ right: "-12px" }}
      >
        <div className="flex items-center bg-gray-50 p-4">
          <div className="truncate">
            <span className="block text-gray-800 font-medium truncate">{full_name}</span>
            <span className="text-xs text-gray-500">{email}</span>
          </div>
        </div>
        <div className="py-2">
          {
            is_admin && (
              <a
                href="/console/dashboard"
                className="text-sm block px-4 py-2 hover:text-brand-primary hover:bg-gray-100"
                target="_blank"
              >
                Administration
              </a>
            )
          }
          <InertiaLink href="/dashboard" className="text-sm block px-4 py-2 hover:text-brand-primary hover:bg-gray-100">
            Dashboard
          </InertiaLink>
          <a href="#" className="text-sm block px-4 py-2 hover:text-brand-primary hover:bg-gray-100">
            Espace Entreprise
            <span className="inline-flex items-center ml-2 px-1.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-brand-100 text-brand-primary">
              Soon
            </span>
          </a>
          <InertiaLink href={`/u/@${username}`} className="text-sm block px-4 py-2 hover:text-brand-primary hover:bg-gray-100">
            Mon Profil
          </InertiaLink>
          <div className="py-3 px-4 mt-1 border-t border-gray-200">
            <InertiaLink
              href="/logout"
              className="text-sm py-2 px-3 inline-block bg-brand-100 rounded text-brand-primary hover:text-white hover:bg-brand-primary"
            >
              Se déconnecter
            </InertiaLink>
          </div>
        </div>
      </div>
    </div>
  );
};
