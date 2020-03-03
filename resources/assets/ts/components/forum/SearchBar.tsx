import React from "react";

export default () => (
  <div className="w-full">
    <div className="relative">
      <span className="relative block" style={{ direction: "ltr" }}>
        <input
          className="transition font-light focus:outline-none focus:bg-gray-100 placeholder-gray-600 rounded-md bg-gray-300 py-2 pr-4 pl-10 block w-full appearance-none leading-normal ds-input"
          type="text"
          placeholder="Rechercher dans le forum"
          autoComplete="off"
          style={{ position: "relative", verticalAlign: "top" }}
        />
      </span>
      <div className="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
        <svg
          className="fill-current pointer-events-none text-gray-600 w-4 h-4"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
        >
          <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
        </svg>
      </div>
    </div>
  </div>
);
