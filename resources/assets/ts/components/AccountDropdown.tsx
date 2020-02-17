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
    isAdmin,
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
        <div className="flex items-center bg-gray-100 px-3 py-4">
          <div className="h-15 w-15 rounded-sm overflow-hidden">
            <img
              src={picture}
              alt="profile"
              className="h-full w-full object-cover"
            />
          </div>
          <div className="pl-4 text-truncate">
            <span className="block text-gray-800 font-medium">{full_name}</span>
            <span className="text-xs text-gray-500">{email}</span>
          </div>
        </div>
        <div className="py-2">
          {
            isAdmin && (
              <a
                href="/console/dashboard"
                className="text-sm block px-4 py-2 hover:text-brand-primary hover:bg-gray-100"
                target="_blank"
              >
                Administration
              </a>
            )
          }
          <InertiaLink
            href="/dashboard"
            className="text-sm block px-4 py-2 hover:text-brand-primary hover:bg-gray-100"
          >
            Dashboard
          </InertiaLink>
          <InertiaLink
            href={`/profil/@${username}`}
            className="text-sm block px-4 py-2 hover:text-brand-primary hover:bg-gray-100"
          >
            Mon Profil
          </InertiaLink>
          <div className="py-3 px-4 mt-1 border-t border-gray-200">
            <InertiaLink
              href="/logout"
              className="text-sm py-2 px-3 inline-block bg-brand-100 rounded text-brand-primary hover:text-white hover:bg-brand-primary"
            >
              Déconnexion
            </InertiaLink>
          </div>
        </div>
      </div>
    </div>
  );
};
