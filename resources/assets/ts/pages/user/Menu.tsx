import * as React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

interface MenuProps {
  current?: string;
}

const Menu = ({ current }: MenuProps) => (
  <nav className="mx-auto max-w-screen-xl w-full relative px-6 tabs inline-flex lg:flex space-x-4 overflow-hidden overflow-x-scroll hidden-scrollbar">
    <InertiaLink className={`block px-2 py-4 border-b-2 border-transparent hover:text-brand-primary ${current === 'dashboard' ? 'tab-active' : ''}`} href="/dashboard">Mon activité</InertiaLink>
    <InertiaLink className={`block px-2 py-4 border-b-2 border-transparent hover:text-brand-primary ${current === 'account' ? 'tab-active' : ''}`} href="/account">Mon compte</InertiaLink>
    <InertiaLink className={`block px-2 py-4 border-b-2 border-transparent hover:text-brand-primary ${current === 'badge' ? 'tab-active' : ''}`} href="/badges">Mes badges</InertiaLink>
    <InertiaLink className={`block px-2 py-4 border-b-2 border-transparent hover:text-brand-primary ${current === 'publish' ? 'tab-active' : ''}`} href="/publishing">Publications</InertiaLink>
    <InertiaLink className={`block px-2 py-4 border-b-2 border-transparent hover:text-brand-primary ${current === 'notifications' ? 'tab-active' : ''}`} href="/notifications">Notifications</InertiaLink>
  </nav>
);

Menu.defaultProps = {
  current: `dashboard`,
};

export default Menu;
