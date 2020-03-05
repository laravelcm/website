import React, { useState } from "react";
import ReactDOM from "react-dom";
import Datepicker, { registerLocale, setDefaultLocale } from "react-datepicker";
import fr from "date-fns/locale/fr";

import TextInput from "@/components/TextInput";

registerLocale('fr', fr);
setDefaultLocale('fr');

const CreateForm = () => {
  const [dates, setDates] = useState({
    date: new Date(),
    time: new Date(),
  });
  const [values, setValues] = useState({
    title: '',
  });

  function changeDate(date: Date | null, element: string) {
    console.log(date);
    // eslint-disable-next-line no-shadow
    setDates((dates) => ({
      ...dates,
      [element]: date,
    }));
  }

  function handleChange(e: React.ChangeEvent<HTMLInputElement>) {
    const key = e.target.name;
    const value = e.target.type === "checkbox" ? e.target.checked : e.target.value;

    // eslint-disable-next-line no-shadow
    setValues((values) => ({
      ...values,
      [key]: value,
    }));
  }

  return (
    <form>
      <h1 className="flex items-center font-semibold text-xl mb-8">
        <svg className="h-6 w-6 fill-current text-gray-500 mr-2" viewBox="0 0 24 24">
          <path d="M19.707 4.293a1 1 0 00-1.414 0L10 12.586V14h1.414l8.293-8.293a1 1 0 000-1.414zM16.88 2.879A3 3 0 1121.12 7.12l-8.585 8.586a1 1 0 01-.708.293H9a1 1 0 01-1-1v-2.828a1 1 0 01.293-.708l8.586-8.585zM6 6a1 1 0 00-1 1v11a1 1 0 001 1h11a1 1 0 001-1v-5a1 1 0 112 0v5a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h5a1 1 0 110 2H6z" />
        </svg>
        Créer un nouvel article
      </h1>
      <div className="flex items-center mb-6">
        <div className="w-full md:w-2/3">
          <TextInput
            name="title"
            value={values.title}
            onChange={handleChange}
            placeholder="Titre de l'article"
            autoFocus
            errors={[]}
          />
        </div>
        <div className="hidden md:flex items-center justify-end w-1/3 mb-3">
          <span className="flex w-full rounded-md shadow-sm sm:w-auto">
            <button type="button" className="btn-white flex items-center">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-6 h-6 mr-2">
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                />
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                />
              </svg>
              Preview
            </button>
          </span>
          <span className="flex w-full rounded-md shadow-sm sm:ml-2 sm:w-auto">
            <button type="submit" className="btn btn-primary flex">
              Enrégistrer
            </button>
          </span>
        </div>
      </div>
      <div className="flex flex-col md:flex-row justify-between">
        <div className="bg-white shadow-md p-4 w-full rounded-md md:w-2/3 mb-4">
          Contenu ici
        </div>
        <div className="w-full md:w-1/3 md:pl-8 justify-end">
          <div className="mb-3 w-full">
            <label className="block tracking-wide font-medium mb-2" htmlFor="published_at">Date de publication</label>
            <div className="flex space-x-2">
              <div className="relative flex bg-white rounded-md border py-2 pr-4 pl-3 w-1/2">
                <span className="pr-6">
                  <Datepicker
                    selected={dates.date}
                    onChange={(date) => changeDate(date, 'date')}
                  />
                </span>
                <div className="pointer-events-none absolute inset-y-0 right-0 pr-4 flex items-center">
                  <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-6 h-6 pointer-events-none text-gray-500">
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                    />
                  </svg>
                </div>
              </div>
              <div className="relative flex bg-white rounded-md border p-2 pl-3 w-1/2">
                <span className="pr-4">
                  <input type="text" />
                </span>
                <div className="pointer-events-none absolute inset-y-0 right-0 pr-2 flex items-center">
                  <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-6 h-6 pointer-events-none text-gray-500">
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                    />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  );
};

const createTagElement = document.getElementById('create-post');

if (createTagElement) {
  ReactDOM.render(<CreateForm />, createTagElement);
}
