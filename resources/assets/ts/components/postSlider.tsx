import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

interface Props {
  title: string;
  image: string;
}

export default ({ title, image }: Props) => {
  return (
    <InertiaLink className="block rounded-lg bg-white h-56 w-full" href="/">
      <img src={image} className="bg-cover w-full h-45 rounded-t-lg" alt="article 1" />
      <div className="py-3 px-2">
        <h4 className="text-sm text-gray-700 font-medium text-truncate">{title}</h4>
      </div>
    </InertiaLink>
  );
}
