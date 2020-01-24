import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

interface Props {
  title: string;
  image: string;
  profile: string;
  name: string;
  datetime: string;
}

export default ({ title, image, profile, name, datetime }: Props) => {
  return (
    <div className="w-full md:w-1/2 md:mb-5 lg:w-1/4 lg:mb-6 md:px-4">
      <InertiaLink className="block rounded-lg bg-white h-75 shadow-md hover:shadow-lg" href="/blog/create-flexible-notification-with-laravel-notify">
        <img src={image} className="bg-cover w-full h-45 rounded-t-lg lg:h-40" alt={title} />
        <span className="p-4 flex flex-col justify-between">
          <span className="h-10 flex text-truncate">
            <h4 className="text-sm text-gray-700 font-medium text-wrap">{title}</h4>
          </span>
          <span className="flex mt-6 items-center">
            <img src={profile} className="h-12 w-12 rounded-full mr-4" alt={name} />
            <span className="flex flex-col">
              <span className="text-sm text-gray-600">{name}</span>
              <small className="text-xs text-gray-400">{datetime}</small>
            </span>
          </span>
        </span>
      </InertiaLink>
    </div>
  );
}
