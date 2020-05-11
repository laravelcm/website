import React, { useState } from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import { navigate } from "@/utils/helpers";

interface MenuProps {
  current?: string;
}

const Menu = ({ current }: MenuProps) => {
  const [selected, setSelected] = useState("");

  function handleChange(e: React.ChangeEvent<HTMLSelectElement>) {
    const { value } = e.target;
    setSelected(value);
    navigate(e, `/${value}`);
  }

  return (
    <div className="bg-white flex items-end py-5 sm:py-0 sm:h-28 sm:border-b sm:border-gray-200">
      <div className="mx-auto max-w-screen-xl w-full relative px-6 tabs inline-flex lg:flex">
        <div className="sm:hidden w-full">
          <select
            className="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-brand focus:border-brand-200 sm:text-sm sm:leading-5 transition ease-in-out duration-150"
            value={selected}
            onChange={handleChange}
          >
            <option value="activity">Mon activité</option>
            {/* <option>Mes badges</option> */}
            <option value="publishing">Publications</option>
            <option value="notifications">Notifications</option>
            <option value="account">Mon compte</option>
          </select>
        </div>
        <div className="hidden sm:block">
          <div>
            <nav className="-mb-px flex space-x-8">
              <InertiaLink
                className={`whitespace-no-wrap py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 ${
                  current === "dashboard"
                    ? "border-brand-900 text-brand-primary focus:outline-none focus:text-brand-500 focus:border-brand-900"
                    : "hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300"
                }`}
                href="/dashboard"
              >
                Mon activité
              </InertiaLink>
              {/* <InertiaLink className={`whitespace-no-wrap py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 ${current === 'badges' ? 'border-brand-900 text-brand-primary focus:outline-none focus:text-brand-500 focus:border-brand-900' : 'hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300'}`} href="/badges">Mes badges</InertiaLink> */}
              <InertiaLink
                className={`whitespace-no-wrap py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 ${
                  current === "publishing"
                    ? "border-brand-900 text-brand-primary focus:outline-none focus:text-brand-500 focus:border-brand-900"
                    : "hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300"
                }`}
                href="/publishing"
              >
                Publications
              </InertiaLink>
              <InertiaLink
                className={`whitespace-no-wrap py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 ${
                  current === "notifications"
                    ? "border-brand-900 text-brand-primary focus:outline-none focus:text-brand-500 focus:border-brand-900"
                    : "hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300"
                }`}
                href="/notifications"
              >
                Notifications
              </InertiaLink>
              <InertiaLink
                className={`whitespace-no-wrap py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 ${
                  current === "account"
                    ? "border-brand-900 text-brand-primary focus:outline-none focus:text-brand-500 focus:border-brand-900"
                    : "hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300"
                }`}
                href="/account"
              >
                Mon compte
              </InertiaLink>
            </nav>
          </div>
        </div>
      </div>
    </div>
  );
};

Menu.defaultProps = {
  current: `dashboard`,
};

export default Menu;
