import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

interface Props {
  title: string;
  image: string;
}

export default ({ title, image }: Props) => {
  return (
    <div className="w-full md:w-1/2 md:mb-5 lg:w-1/4 lg:mb-6 md:px-6">
      <InertiaLink className="block rounded-lg bg-white h-56 shadow-md hover:shadow-lg lg:h-58" href="/">
        <img src={image} className="bg-cover w-full h-45 rounded-t-lg lg:h-40" alt={title} />
        <div className="py-3 px-2">
          <h4 className="text-sm text-gray-700 font-medium text-truncate">{title}</h4>
        </div>
      </InertiaLink>
    </div>
  );
}
