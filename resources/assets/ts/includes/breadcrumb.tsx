import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

interface BreadcrumbsProps {
  parentLink: string;
  parentTitle: string;
  title: string;
}

export default ({ parentLink, parentTitle, title }: BreadcrumbsProps) => {
  return (
    <div className="bg-gradient-white py-3 text-sm text-gray-600 hidden lg:block">
      <div className="container">
        <InertiaLink href="/" className="hover:text-gray-800">Accueil</InertiaLink>
        <span className="mx-4">/</span>
        <InertiaLink href={parentLink} className="hover:text-gray-800">{parentTitle}</InertiaLink>
        <span className="mx-4">/</span>
        <span>{title}</span>
      </div>
    </div>
  );
}
