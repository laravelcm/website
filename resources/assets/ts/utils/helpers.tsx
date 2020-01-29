/**
 * ansiWordBound
 *
 * @param c
 */
const ansiWordBound = (c: any) => {
  return (
    (c === ' ') ||
    (c === '\n') ||
    (c === '\r') ||
    (c === '\t')
  );
};

/**
 * Reading Time
 *
 * @param text string
 * @param options object
 */
type options = {
  wordsPerMinute?: number;
  wordBound?: (c: any) => boolean;
}

export const readingTime = (text: string, options: options) => {
  let words = 0, start = 0, end = text.length - 1, i;

  options = options || {};

  // use default values if necessary
  options.wordsPerMinute = options.wordsPerMinute || 200;

  // use provided function if available
  const wordBound = options.wordBound || ansiWordBound;

  // fetch bounds
  while (wordBound(text[start])) start++;
  while (wordBound(text[end])) end--;

  // calculate the number of words
  for (i = start; i <= end;) {
    for (; i <= end && !wordBound(text[i]); i++);
    words++;
    for (; i <= end && wordBound(text[i]); i++);
  }

  // reading time stats
  const minutes = words / options.wordsPerMinute;
  const time = minutes * 60 * 1000;
  const displayed = Math.ceil(Number(minutes.toFixed(2)));

  return {
    text: `${displayed} min de lecture`,
    minutes,
    time,
    words
  }
};

export const toCapitalize = (s: string) => s.substr(0, 1).toUpperCase() + s.substr(1).toLowerCase();
