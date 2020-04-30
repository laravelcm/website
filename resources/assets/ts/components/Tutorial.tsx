import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import { TutorialType } from "@/utils/types";

interface Props {
  tutorial: TutorialType;
}

export default ({ tutorial }: Props) => (
  <div className="w-full">
    <InertiaLink
      className="block rounded-lg overflow-hidden bg-white min-h-sm shadow-md group hover:shadow-lg hover:text-gray-800"
      href={`/tutorial/${tutorial.slug}`}
    >
      <img
        src={tutorial.image}
        className="object-cover w-full h-48"
        alt={tutorial.title}
      />
      <div className="p-4 relative">
        <span className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-100 text-green-800">
          {tutorial.category.name}
        </span>
        <h4 className="text-sm text-gray-700 font-medium group-hover:text-gray-900 mt-2">
          {tutorial.title}
        </h4>
      </div>
    </InertiaLink>
  </div>
);
