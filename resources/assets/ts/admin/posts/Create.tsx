import React, { useState } from "react";
import ReactDOM from "react-dom";
import Datepicker, { registerLocale, setDefaultLocale } from "react-datepicker";
// eslint-disable-next-line import/no-duplicates
import { format } from "date-fns";
// eslint-disable-next-line import/no-duplicates
import fr from "date-fns/locale/fr";
import classNames from "classnames";

registerLocale('fr', fr);
setDefaultLocale('fr');

const CreateForm = () => {
  const [status, setStatus] = useState(false);
  const [dates, setDates] = useState({
    date: new Date(),
    time: new Date(),
    dateFormatted: '',
    timeFormatted: '',
    published_at: new Date(),
  });

  const className = classNames('absolute block w-4 h-4 mt-1 ml-1 rounded-full shadow inset-y-0 left-0 focus-within:shadow-outline transition-transform duration-300 ease-in-out', {
    'bg-brand-primary transform translate-x-full': status,
    'bg-white': !status,
  });

  function changeTime(date: Date | null) {
    const dateFormatted = dates.dateFormatted ?? '';
    let timeFormatted = dates.timeFormatted ?? '';
    let realTime: Date;

    if (date) {
      realTime = date;
      timeFormatted = format(date, 'HH:mm:ss');
    }

    if (dateFormatted === '') {
      const currentDate = format(dates.date, 'yyyy-MM-dd');
      // eslint-disable-next-line no-shadow
      setDates((dates) => ({
        ...dates,
        timeFormatted,
        time: realTime,
        published_at: new Date(`${currentDate} ${timeFormatted}`),
      }));
    } else {
      // eslint-disable-next-line no-shadow
      setDates((dates) => ({
        ...dates,
        timeFormatted,
        time: realTime,
        published_at: new Date(`${dateFormatted} ${timeFormatted}`),
      }));
    }
  }

  function changeDate(date: Date | null) {
    let dateFormatted = dates.dateFormatted ?? '';
    let realDate: Date;
    const timeFormatted = dates.timeFormatted ?? '';

    if (date) {
      realDate = date;
      dateFormatted = format(date, 'yyyy-MM-dd');
    }

    if (timeFormatted === '') {
      const currentTime = format(dates.time, 'HH:mm:ss');
      // eslint-disable-next-line no-shadow
      setDates((dates) => ({
        ...dates,
        dateFormatted,
        date: realDate,
        published_at: new Date(`${dateFormatted} ${currentTime}`),
      }));
    } else {
      // eslint-disable-next-line no-shadow
      setDates((dates) => ({
        ...dates,
        dateFormatted,
        date: realDate,
        published_at: new Date(`${dateFormatted} ${timeFormatted}`),
      }));
    }
  }

  return (
    <>
      <div className="w-full">
        <label className="block tracking-wide font-medium mb-2" htmlFor="published_at">Date de publication</label>
        <input type="hidden" value={dates.published_at.toISOString()} name="published_at" />
        <div className="flex space-x-2">
          <div className="relative flex bg-white rounded-md border p-2 pl-3 w-3/5">
            <span className="pr-6">
              <Datepicker
                selected={dates.date}
                onChange={(date) => changeDate(date)}
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
          <div className="relative flex bg-white rounded-md border p-2 pl-3 w-2/5">
            <span className="pr-4">
              <Datepicker
                selected={dates.time}
                onChange={(date) => changeTime(date)}
                showTimeSelect
                showTimeSelectOnly
                timeIntervals={15}
                timeCaption="Heure"
                dateFormat="h:mm"
              />
            </span>
            <div className="pointer-events-none absolute inset-y-0 right-0 pr-2 flex items-center">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-6 h-6 pointer-events-none text-gray-500">
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div>
        <label htmlFor="checked" className="flex items-center justify-between cursor-pointer block text-sm leading-5 font-medium text-gray-700">
          <span>Publié l'article</span>
          <span className="relative">
            <span className="block w-10 h-6 bg-gray-400 rounded-full shadow-inner" />
            <span className={className}>
              <input
                id="checked"
                type="checkbox"
                name="status"
                onChange={(e) => setStatus(e.target.checked)}
                className="absolute opacity-0 w-0 h-0"
                checked={status}
              />
            </span>
          </span>
        </label>
      </div>
    </>
  );
};

const tagElement = document.getElementById('datepicker');

if (tagElement) {
  ReactDOM.render(<CreateForm />, tagElement);
}
