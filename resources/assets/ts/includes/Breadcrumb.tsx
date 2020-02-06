import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

interface BreadcrumbsProps {
  homeLink?: string;
  homeTitle?: string;
  parentLink: string;
  parentTitle: string;
  title: string;
}

const Breadcrumb =  ({ homeLink, homeTitle, parentLink, parentTitle, title }: BreadcrumbsProps) => {
  return (
    <div className="bg-gradient-white py-3 text-sm text-gray-600 hidden lg:block">
      <div className="container">
        <InertiaLink href={homeLink || '/'} className="hover:text-gray-800">{homeTitle}</InertiaLink>
        <span className="mx-4">/</span>
        <InertiaLink href={parentLink} className="hover:text-gray-800">{parentTitle}</InertiaLink>
        <span className="mx-4">/</span>
        <span>{title}</span>
      </div>
    </div>
  );
};

Breadcrumb.defaultProps = {
  homeLink: `/`,
  homeTitle: `Accueil`
};

export default Breadcrumb;
