import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

interface CategoryProps {
  slug: string;
  name: string;
}

export default ({ slug, name }: CategoryProps) => (
  <InertiaLink
    href={`/forum/channels/${slug}`}
    className="forum-category flex flex-col py-4 w-28 items-center justify-between bg-white shadow-lg text-gray-700 hover:bg-gray-50 rounded"
  >
    <img src={require(`@/assets/categories/${slug}.svg`)} alt={name} />
    <span className="text-sm">{name}</span>
  </InertiaLink>
);
