import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";
import classNames from "classnames";

const PageLink = ({ active, label, url }: { active: boolean; label: string; url: string }) => {
  const className = classNames(
    [
      'mr-1 mb-1',
      'px-4 py-3',
      'rounded',
      'text-sm',
      'hover:bg-brand-primary hover:text-white bg-white',
      'focus:text-white focus:bg-brand-primary',
    ],
    {
      'bg-brand-primary text-white': active,
      'ml-auto': label === 'Suivant',
    },
  );
  return (
    <InertiaLink className={className} href={url}>
      {label}
    </InertiaLink>
  );
};

// Previous, if on first page
// Next, if on last page
// and dots, if exists (...)
const PageInactive = ({ label }: { label: string }) => {
  const className = classNames(
    'mr-1 mb-1 px-4 py-3 text-sm rounded text-gray-600 bg-white',
    {
      'ml-auto': label === 'Suivant',
    },
  );
  return <div className={className}>{label}</div>;
};

export default ({ links = [] }) => {
  // dont render, if there's only 1 page (previous, 1, next)
  if (links.length === 3) return null;
  return (
    <div className="mt-6 -mb-1 flex flex-wrap">
      {links.map(({ active, label, url }) => (url === null ? (
        <PageInactive key={label} label={label} />
      ) : (
        <PageLink key={label} label={label} active={active} url={url} />
      )))}
    </div>
  );
};
