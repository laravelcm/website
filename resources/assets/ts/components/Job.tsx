import React from "react";

interface JobProps {
  grid?: boolean;
  image: string;
  title: string;
  company: string;
}

const Job = ({
  grid, image, title, company,
}: JobProps) => {
  const listView = (
    <div className="bg-white p-6 mb-2 rounded-md flex flex-col md:flex-row w-full items-center cursor-pointer hover:shadow-smooth">
      <div className="w-full md:w-1/2 flex items-center mb-3 md:mb-0">
        <img src={image} alt={company} />
        <div className="ml-4">
          <h4 className="font-medium text-gray-800">{title}</h4>
          <span className="text-sm text-gray-500">
            {company},{" "}
            <span className="text-xs text-gray-600">il y'a 10min</span>
          </span>
        </div>
      </div>
      <div className="w-full md:w-1/2 flex justify-between items-center">
        <div>
          <h4 className="text-sm text-gray-800 mb-1">Temps plein</h4>
          <span className="text-xs">à Yaounde, CM</span>
        </div>
        <div>
          <h4 className="text-sm text-gray-800 mb-1">Bureau</h4>
          <span className="text-xs">0-2 ans d'Exp.</span>
        </div>
        <button type="button" className="hover:text-brand-primary">
          <svg
            className="h-6 w-6 fill-current"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6.1 21.98a1.001 1.001 0 01-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 01.56-1.71l6.05-.88 2.7-5.48a1 1 0 011.8 0l2.7 5.48 6.06.88a1 1 0 01.55 1.7l-4.38 4.27 1.04 6.03a1 1 0 01-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 01.93 0l4.08 2.15-.78-4.55a1 1 0 01.29-.88l3.3-3.22-4.56-.67a1 1 0 01-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 01-.75.54l-4.57.67 3.3 3.22a1 1 0 01.3.88l-.79 4.55 4.09-2.15z"
              fill="currentColor"
            />
          </svg>
        </button>
      </div>
    </div>
  );

  const gridView = (
    <div className="w-full md:w-1/3 px-2">
      <div className="bg-white p-6 md:mb-4 rounded-md cursor-pointer hover:shadow-smooth">
        <div className="flex items-center mb-3">
          <img src={image} alt={company} />
          <div className="ml-4">
            <h4 className="text-sm text-gray-800">{title}</h4>
            <span className="text-xs text-gray-500">{company}</span>
          </div>
        </div>
        <div className="mb-4">
          <div className="flex justify-between items-center mb-3">
            <div>
              <h4 className="text-sm text-gray-800 mb-1">Temps plein</h4>
              <span className="text-xs">à Yaounde, CM</span>
            </div>
            <div>
              <h4 className="text-sm text-gray-800 mb-1">Bureau</h4>
              <span className="text-xs">0-2 ans d'Exp.</span>
            </div>
          </div>
          <p className="text-xs text-gray-500">
            Toffee topping fruitcake. Halvah pu dding topping. Dragée bear claw
            sugar plum. Donut fruitcake croissant sesame snap...
          </p>
        </div>
        <div className="flex items-center justify-between">
          <span className="text-sm">il y'a 10min</span>
          <button type="button" className="hover:text-brand-primary">
            <svg
              className="h-6 w-6 fill-current"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M6.1 21.98a1.001 1.001 0 01-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 01.56-1.71l6.05-.88 2.7-5.48a1 1 0 011.8 0l2.7 5.48 6.06.88a1 1 0 01.55 1.7l-4.38 4.27 1.04 6.03a1 1 0 01-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 01.93 0l4.08 2.15-.78-4.55a1 1 0 01.29-.88l3.3-3.22-4.56-.67a1 1 0 01-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 01-.75.54l-4.57.67 3.3 3.22a1 1 0 01.3.88l-.79 4.55 4.09-2.15z"
                fill="currentColor"
              />
            </svg>
          </button>
        </div>
      </div>
    </div>
  );

  if (grid) {
    return gridView;
  }

  return listView;
};

Job.defaultProps = {
  grid: false,
};

export default Job;
