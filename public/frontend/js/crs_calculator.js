document.addEventListener('DOMContentLoaded', () => {
  // ─────────────────────────────────────────────────────────────────────────────
  // 1. Helper: safe integer parse
  // ─────────────────────────────────────────────────────────────────────────────
  function toInt(value) {
    const n = parseInt(value, 10);
    return isNaN(n) ? 0 : n;
  }

  // ─────────────────────────────────────────────────────────────────────────────
  // 2. Points mappings
  // ─────────────────────────────────────────────────────────────────────────────
  // Age
  const agePointsWithSpouse = {
    '17': 0, '18': 90, '19': 95, '20-29': 100, '30': 95, '31': 90,
    '32': 85, '33': 80, '34': 75, '35': 70, '36': 65, '37': 60,
    '38': 55, '39': 50, '40': 45, '41': 35, '42': 25, '43': 15,
    '44': 5, '45+': 0
  };
  const agePointsWithoutSpouse = {
    '17': 0, '18': 99, '19': 105, '20-29': 110, '30': 105, '31': 99,
    '32': 94, '33': 88, '34': 83, '35': 77, '36': 72, '37': 66,
    '38': 61, '39': 55, '40': 50, '41': 39, '42': 28, '43': 17,
    '44': 6, '45+': 0
  };

  // Education
  const eduPointsWithSpouse = {
    'less_secondary': 0, 'secondary': 28, 'one_year': 84, 'two_year': 91,
    'bachelors': 112, 'two_certificate': 119, 'masters': 126, 'doctoral': 140
  };
  const eduPointsWithoutSpouse = {
    'less_secondary': 0, 'secondary': 30, 'one_year': 90, 'two_year': 98,
    'bachelors': 120, 'two_certificate': 128, 'masters': 135, 'doctoral': 150
  };

  // First Official Language (CLB)
  const firstLangPointsWithSpouse = {
    '4': 0, '5': 6, '6': 8, '7': 16, '8': 22, '9': 29, '10': 32
  };
  const firstLangPointsWithoutSpouse = {
    '4': 0, '5': 6, '6': 9, '7': 17, '8': 23, '9': 31, '10': 34
  };

  // Second Official Language (CLB)
  const secondLangPoints = {
    '4': 0, '5-6': 1, '7-8': 3, '9+': 6
  };

  // Canadian Work Experience
  const expPointsWithSpouse = { '0': 0, '1': 35, '2': 46, '3': 56, '4': 63, '5+': 70 };
  const expPointsWithoutSpouse = { '0': 0, '1': 40, '2': 53, '3': 64, '4': 72, '5+': 80 };

  // Spouse Factors
  const spouseEduPoints  = {
    'less_secondary': 0, 'secondary': 2, 'one_year': 6,
    'two_year': 7, 'bachelors': 8, 'two_certificate': 9,
    'masters': 10, 'doctoral': 10
  };
  const spouseLangPoints = { '4': 0, '5-6': 1, '7-8': 3, '9+': 5 };
  const spouseExpPoints  = { '0': 0, '1': 5, '2': 7, '3': 8, '4': 9, '5+': 10 };

  // Skills Transferability – Education + Language
  const transferEduCLB78 = {
    'less_secondary': 0, 'secondary': 0, 'one_year': 13,
    'two_year': 13, 'bachelors': 13, 'two_certificate': 25,
    'masters': 25, 'doctoral': 25
  };
  const transferEduCLB9p = {
    'less_secondary': 0, 'secondary': 0, 'one_year': 25,
    'two_year': 25, 'bachelors': 25, 'two_certificate': 50,
    'masters': 50, 'doctoral': 50
  };

  // Skills Transferability – Canadian Experience + Education
  const transferCan1yr = {
    'less_secondary': 0, 'secondary': 0, 'one_year': 13,
    'two_year': 13, 'bachelors': 13, 'two_certificate': 25,
    'masters': 25, 'doctoral': 25
  };
  const transferCan2yr = {
    'less_secondary': 0, 'secondary': 0, 'one_year': 25,
    'two_year': 25, 'bachelors': 25, 'two_certificate': 50,
    'masters': 50, 'doctoral': 50
  };

  // Skills Transferability – Foreign Experience + Language
  const transferFrgnCLB78 = { '0': 0, '1-2': 13, '3+': 25 };
  const transferFrgnCLB9p = { '0': 0, '1-2': 25, '3+': 50 };

  // Skills Transferability – Trade Certificate + Language
  const transferCertCLB57 = 25;
  const transferCertCLB7p = 50;

  // ─────────────────────────────────────────────────────────────────────────────
  // 3. Cache DOM elements
  // ─────────────────────────────────────────────────────────────────────────────
  const E = id => document.getElementById(id);
  const els = {
    age:         E('age'),
    education:   E('education'),
    lang1:       E('lang1'),
    lang2:       E('lang2'),
    canExp:      E('canExp'),
    foreignExp:  E('foreignExp'),
    hasSpouse:   E('hasSpouse'),
    spouseSection: E('spouseSection'),
    spEducation: E('spEducation'),
    spLang:      E('spLang'),
    spCanExp:    E('spCanExp'),
    tranCert:    E('tranCert'),
    pnp:         E('pnp'),
    postSecEdu:  E('postSecEdu'),
    french:      E('french'),
    sibling:     E('sibling'),
    score:       E('scoreDisplay')
  };

  // ─────────────────────────────────────────────────────────────────────────────
  // 4. Main scoring function
  // ─────────────────────────────────────────────────────────────────────────────
  function calculateScore() {
    let total = 0;
    let bonus = 0;

    // Read values from inputs
    const ageVal     = els.age.value;
    const eduVal     = els.education.value;
    const lang1Val   = els.lang1.value;
    const lang2Val   = els.lang2.value;
    const canYr      = toInt(els.canExp.value);
    const frgnYr     = toInt(els.foreignExp.value);
    const includeSp  = els.hasSpouse.checked;
    const hasCert    = els.tranCert.value === '1';
    const pnpPts     = toInt(els.pnp.value);
    const postSecPts = toInt(els.postSecEdu.value);
    const frenchPts  = toInt(els.french.value);
    const sibPts     = toInt(els.sibling.value);

    // ---- Core + Spouse block ----
    if (includeSp) {
      // Age, education, languages, experience
      total += agePointsWithSpouse[ ageVal ]    || 0;
      total += eduPointsWithSpouse[ eduVal ]    || 0;
      total += firstLangPointsWithSpouse[ lang1Val ] || 0;
      total += secondLangPoints[ lang2Val ]     || 0;
      total += expPointsWithSpouse[ canYr ]     || 0;

      // Spouse factors
      total += spouseEduPoints[ els.spEducation.value ] || 0;
      total += spouseLangPoints[ els.spLang.value ]     || 0;
      total += spouseExpPoints[ els.spCanExp.value ]    || 0;
    } else {
      // Just core
      total += agePointsWithoutSpouse[ ageVal ]    || 0;
      total += eduPointsWithoutSpouse[ eduVal ]    || 0;
      total += firstLangPointsWithoutSpouse[ lang1Val ] || 0;
      total += secondLangPoints[ lang2Val ]       || 0;
      total += expPointsWithoutSpouse[ canYr ]     || 0;
    }

    // ---- Skills Transferability ----
    const l1num = parseInt(lang1Val,10) || 0;
    // Education + L1
    if (l1num >= 9)       bonus += transferEduCLB9p[ eduVal ]  || 0;
    else if (l1num >= 7)  bonus += transferEduCLB78[ eduVal ]  || 0;
    // Canadian exp + Edu
    if (canYr >= 2)       bonus += transferCan2yr[ eduVal ]    || 0;
    else if (canYr >= 1)  bonus += transferCan1yr[ eduVal ]    || 0;
    // Foreign exp + L1
    const frKey = frgnYr >= 3 ? '3+' : (frgnYr >= 1 ? '1-2' : '0');
    if (l1num >= 9)       bonus += transferFrgnCLB9p[ frKey ]  || 0;
    else if (l1num >= 7)  bonus += transferFrgnCLB78[ frKey ]  || 0;
    // Certificate + L1
    if (hasCert) {
      bonus += (l1num >= 7 ? transferCertCLB7p : transferCertCLB57);
    }
    // Cap at 100
    bonus = Math.min(bonus, 100);

    // ---- Additional Points ----
    total += pnpPts + postSecPts + sibPts;
    if (frenchPts >= 7) total += (l1num >= 5 ? 50 : 25);

    // Add the transferability bonus
    total += bonus;

    // Render the final score
    els.score.innerText = `Score: ${total} / 1200`;
  }

  // ─────────────────────────────────────────────────────────────────────────────
  // 5. Wire up events
  // ─────────────────────────────────────────────────────────────────────────────
  // 5a) Only the checkbox toggles the spouse section
  els.hasSpouse.addEventListener('change', () => {
    if (els.hasSpouse.checked) {
      els.spouseSection.classList.remove('hidden');
    } else {
      els.spouseSection.classList.add('hidden');
    }
    calculateScore();
  });

  // 5b) Every other input just triggers recalculation
  [
    'age','education','lang1','lang2','canExp','foreignExp',
    'spEducation','spLang','spCanExp',
    'tranCert','pnp','postSecEdu','french','sibling'
  ].forEach(id => {
    const el = E(id);
    if (el) el.addEventListener('change', calculateScore);
  });

  // ─────────────────────────────────────────────────────────────────────────────
  // 6. Initial run to populate the score at load
  // ─────────────────────────────────────────────────────────────────────────────
  calculateScore();
});
