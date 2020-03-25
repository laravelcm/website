import * as React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

interface MenuProps {
  current?: string;
}

const Menu = ({ current }: MenuProps) => (
  <div className="bg-gradient-white flex items-end h-28">
    <nav className="mx-auto max-w-screen-xl w-full relative px-6 tabs inline-flex lg:flex space-x-4 overflow-hidden overflow-x-scroll hidden-scrollbar">
      <InertiaLink className={`block px-2 py-4 border-b-2 border-transparent hover:text-brand-primary ${current === 'dashboard' ? 'tab-active' : ''}`} href="/dashboard">Mon activité</InertiaLink>
      <InertiaLink className={`block px-2 py-4 border-b-2 border-transparent hover:text-brand-primary ${current === 'account' ? 'tab-active' : ''}`} href="/account">Mon compte</InertiaLink>
      {/* eslint-disable-next-line max-len */}
      {/* <InertiaLink className={`block px-2 py-4 border-b-2 border-transparent hover:text-brand-primary ${current === 'badges' ? 'tab-active' : ''}`} href="/badges">Mes badges</InertiaLink> */}
      {/* eslint-disable-next-line max-len */}
      {/* <InertiaLink className={`block px-2 py-4 border-b-2 border-transparent hover:text-brand-primary ${current === 'publishing' ? 'tab-active' : ''}`} href="/publishing">Publications</InertiaLink> */}
      <InertiaLink className={`block px-2 py-4 border-b-2 border-transparent hover:text-brand-primary ${current === 'notifications' ? 'tab-active' : ''}`} href="/notifications">Notifications</InertiaLink>
    </nav>
  </div>
);

Menu.defaultProps = {
  current: `dashboard`,
};

export default Menu;
