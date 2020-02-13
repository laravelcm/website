import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

interface Props {
  title: string;
  image: string;
}

export default ({ title, image }: Props) => (
  <div className="w-full md:w-1/2 md:mb-5 lg:w-1/4 lg:mb-6 md:px-4">
    <InertiaLink
      className="block rounded-lg bg-white h-59 shadow-md group hover:shadow-lg hover:text-gray-800"
      href="/tutorial/laravel-app-on-digital-ocean-ubuntu-1904-droplet-step-by-step-guide"
    >
      <img
        src={image}
        className="bg-cover w-full h-36 rounded-t-lg"
        alt="tutorial 1"
      />
      <div className="p-4 relative">
        <h4 className="text-sm text-gray-700 font-medium group-hover:text-gray-900">
          {title}
        </h4>
      </div>
    </InertiaLink>
  </div>
);
