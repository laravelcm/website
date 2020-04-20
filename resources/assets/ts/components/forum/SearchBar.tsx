import React, { useState } from "react";
import { usePage } from "@inertiajs/inertia-react";

export default () => {
  const { filters } = usePage();
  const [search, setSearch] = useState(filters.search || '');

  return (
    <div className="w-full">
      <form className="relative" action="/forum" method="GET">
        <div className="mt-1 relative rounded-md shadow-sm">
          <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg
              className="h-5 w-5 text-gray-400"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path fillRule="evenodd" clipRule="evenodd" d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
            </svg>
          </div>
          <input
            className="form-input block w-full pl-10 sm:text-sm sm:leading-5 transition ease-out duration-100"
            type="text"
            placeholder="Rechercher dans le forum"
            autoComplete="off"
            value={search}
            name="search"
            onChange={(e) => setSearch(e.target.value)}
          />
        </div>
      </form>
    </div>
  );
};
