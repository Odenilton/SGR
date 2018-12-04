package br.com.oljsoft.sgr.utils;

import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.text.DateFormat;
import java.text.DecimalFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.Locale;

/**
 * Classe utilitária para o tratamento de datas (Date e Calendar).
 *
 */
public class DateUtils {
	private static final String defaultDateFormat = "dd/MM/yyyy";

	protected static SimpleDateFormat dateFormat = new SimpleDateFormat();

	static {
		dateFormat.setLenient(false);
	}

	public static Integer calculaIdade(Date dataNasc) {

		Calendar dataNascimento = Calendar.getInstance();
		dataNascimento.setTime(dataNasc);
		Calendar hoje = Calendar.getInstance();

		Integer idade = hoje.get(Calendar.YEAR) - dataNascimento.get(Calendar.YEAR);

		if (hoje.get(Calendar.MONTH) < dataNascimento.get(Calendar.MONTH)) {
			idade--;
		} else {
			if (hoje.get(Calendar.MONTH) == dataNascimento.get(Calendar.MONTH)
					&& hoje.get(Calendar.DAY_OF_MONTH) < dataNascimento.get(Calendar.DAY_OF_MONTH)) {
				idade--;
			}
		}

		return idade;
	}

	public static String calculaIdadeString(Date dataNasc) {

		Integer idade = calculaIdade(dataNasc);

		if (idade == 1)
			return idade + " ano";
		else
			return idade + " anos";
	}

	public static boolean isValidDateStr(String date, String pattern) throws ParseException {
		try {
			if (pattern == null) {
				pattern = defaultDateFormat;
			}
			dateFormat.applyPattern(pattern);
			dateFormat.parse(date);
		} catch (Exception e) {
			return false;
		}
		return true;
	}

	public static boolean isValidDateStr(Date date, String pattern) throws ParseException {
		try {
			if (pattern == null) {
				pattern = defaultDateFormat;
			}
			dateFormat.applyPattern(pattern);
			dateFormat.format(date);
		} catch (Exception e) {
			return false;
		}
		return true;
	}

	/**
	 * Cria uma data de acordo com o formato informado. Para detalhes de como deve
	 * ser o formato veja a classe java.text.DateFormat
	 *
	 * @see java.text.DateFormat
	 */
	public static Date parse(String strData, String pattern) throws ParseException {
		if (pattern == null) {
			pattern = defaultDateFormat;
		}

		dateFormat.applyPattern(pattern);
		return dateFormat.parse(strData);
	}

	/**
	 * Cria uma data no formato 'dd/mm/aaaa' a partir da string informada.
	 */
	public static Date parse(String strData) throws ParseException {
		String data = formata(strData);
		return parse(data, null);
	}

	/**
	 * Retorna uma String com a data formatada de acordo com o formato informado.
	 * Para detalhes de como deve ser o formato veja a classe java.text.DateFormat
	 *
	 * @see java.text.DateFormat
	 */
	public static String format(Date date, String pattern) {
		if (pattern == null) {
			pattern = defaultDateFormat;
		}

		dateFormat.applyPattern(pattern);
		return dateFormat.format(date);
	}

	/**
	 * Retorna um Date com a data formatada de acordo com o formato informado. Para
	 * detalhes de como deve ser o formato veja a classe java.text.DateFormat
	 *
	 * @see java.text.DateFormat
	 */
	public static String formata(String dates) {
		String dateStr = dates;
		DateFormat readFormat = new SimpleDateFormat("yyyy-MM-dd");

		DateFormat writeFormat = new SimpleDateFormat(defaultDateFormat);
		Date date = null;
		try {
			date = readFormat.parse(dateStr);
		} catch (ParseException e) {
			e.printStackTrace();
		}

		String formattedDate = "";
		if (date != null) {
			formattedDate = writeFormat.format(date);
		}
		return formattedDate;
	}

	/**
	 * Retorna uma data no formato 'dd/mm/aaaa'.
	 */
	public static String format(Date date) {
		return format(date, null);
	}

	/**
	 * Retorna o ano corrente.
	 */
	public static int getCurrentYear() {
		Calendar hoje = Calendar.getInstance();

		return hoje.get(Calendar.YEAR);
	}

	/**
	 * Cria um objeto Calendar a partir da data informada (padrão 'dd/mm/aaaa').
	 *
	 * @param date
	 * @return
	 * @throws ParseException
	 */
	public static Calendar parseToCalendar(String date) throws ParseException {
		Date dt = parse(date);

		return toCalendar(dt);
	}

	/**
	 * Cria um Calendar de acordo com o formato informado. Para detalhes de como
	 * deve ser o formato veja a classe java.text.DateFormat
	 *
	 * @see java.text.DateFormat
	 */
	public static Calendar parseToCalendar(String date, String pattern) throws ParseException {
		Date dt = parse(date, pattern);

		return toCalendar(dt);
	}

	/**
	 * Retorna um Calendar a partir de um Date.
	 */
	public static Calendar toCalendar(Date date) {
		if (date == null) {
			return null;
		}

		Calendar cal = Calendar.getInstance();
		cal.setTime(date);

		return cal;
	}

	/**
	 * Retorna uma String com a data formatada de acordo com o formato informado.
	 * Para detalhes de como deve ser o formato veja a classe java.text.DateFormat
	 *
	 * @see java.text.DateFormat
	 */
	public static String format(Calendar date, String pattern) {
		return format(date.getTime(), pattern);
	}

	/**
	 * Retorna uma data no formato 'dd/mm/aaaa'.
	 */
	public static String format(Calendar date) {
		return format(date.getTime(), null);
	}

	public static Date getPrimeiroDiaDoMesEAno(Integer mes, Integer ano) {
		return getData(01, mes, ano);
	}

	public static GregorianCalendar getDataHojeSemHHMMSS() {
		return getDataComHoraMinutoSegundoZerado(new Date());
	}

	public static Date getData(Integer dia, Integer mes, Integer ano) {
		try {
			return formatarDataDDMMYYYY(dia + "/" + mes + "/" + ano);
		} catch (ParseException e) {
			e.printStackTrace();
		}
		return null;
	}

	public static Date getData(String strData) throws ParseException {
		return new SimpleDateFormat("dd/MM/yyyy").parse(strData);
	}

	public static String getData(Date strData) {
		return new SimpleDateFormat("dd/MM/yyyy").format(strData);
	}

	public static Date getData(String strData, String horaMinutoSegundo) throws ParseException {
		return new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").parse(strData + horaMinutoSegundo);
	}

	public static Date getUltimoDiaDoMesEAno(Integer mes, Integer ano) {
		Date data = getPrimeiroDiaDoMesEAno(mes, ano);
		Integer ultimoDiaDoMes = getUltimoDiaDoMes(data);
		return getData(ultimoDiaDoMes, mes, ano);
	}

	public static Integer getUltimoDiaDoMes(Date data) {
		GregorianCalendar calendar = convertDataCalendar(data);
		Integer ultimoDiaDoMes = calendar.getActualMaximum(GregorianCalendar.DAY_OF_MONTH);
		return ultimoDiaDoMes;
	}

	public static Date getPrimeiroDiaDoMesEAno(Date data) {
		Integer mes = getMesDaData(data);
		Integer ano = getAnoDaData(data);
		return getPrimeiroDiaDoMesEAno(mes, ano);
	}

	public static Date getUltimoDiaDoMesEAno(Date data) {
		Integer mes = getMesDaData(data);
		Integer ano = getAnoDaData(data);
		return getUltimoDiaDoMesEAno(mes, ano);
	}

	public static Integer getMesDaData(Date data) {
		return Integer.parseInt(new SimpleDateFormat("MM").format(data));
	}

	public static Integer getAnoDaData(Date data) {
		return Integer.parseInt(new SimpleDateFormat("yyyy").format(data));
	}

	public static String getMesAnoDaData(Date data) {
		if (data == null) {
			return null;
		}
		return new SimpleDateFormat("MM/yyyy").format(data);
	}

	public static String getMesAbreviado(int mes) {
		switch (mes) {
		case 1:
			return "Jan";
		case 2:
			return "Fev";
		case 3:
			return "Mar";
		case 4:
			return "Abr";
		case 5:
			return "Mai";
		case 6:
			return "Jun";
		case 7:
			return "Jul";
		case 8:
			return "Ago";
		case 9:
			return "Set";
		case 10:
			return "Out";
		case 11:
			return "Nov";
		case 12:
			return "Dez";
		default:
			return "";
		}
	}

	public static int contaOcorrenciasDeSubstring(String texto, String subString) {
		String str = texto;
		String findStr = subString;
		int lastIndex = 0;
		int count = 0;

		while (lastIndex != -1) {

			lastIndex = str.indexOf(findStr, lastIndex);

			if (lastIndex != -1) {
				count++;
				lastIndex += findStr.length();
			}
		}
		return count;
	}

	public static Integer getDiaDaData(Date data) {
		return Integer.parseInt(new SimpleDateFormat("dd").format(data));
	}

	public static Integer calcularDiferencaDeMeses(Date dataInicial, Date dataFinal) {
		GregorianCalendar inicial = new GregorianCalendar();
		GregorianCalendar fim = new GregorianCalendar();
		inicial.setTime(dataInicial);
		fim.setTime(dataFinal);
		int meses = 0;
		boolean dataIniMaior = false;
		GregorianCalendar gc1, gc2;

		if (fim.after(inicial)) {
			gc2 = (GregorianCalendar) fim.clone();
			gc1 = (GregorianCalendar) inicial.clone();
		} else {
			dataIniMaior = true;
			gc2 = (GregorianCalendar) inicial.clone();
			gc1 = (GregorianCalendar) fim.clone();
		}

		gc1.clear(Calendar.MILLISECOND);
		gc1.clear(Calendar.SECOND);
		gc1.clear(Calendar.MINUTE);
		gc1.clear(Calendar.HOUR_OF_DAY);
		gc1.clear(Calendar.DATE);

		gc2.clear(Calendar.MILLISECOND);
		gc2.clear(Calendar.SECOND);
		gc2.clear(Calendar.MINUTE);
		gc2.clear(Calendar.HOUR_OF_DAY);
		gc2.clear(Calendar.DATE);

		while (gc1.before(gc2)) {
			if (gc1.get(Calendar.MONTH) == gc2.get(Calendar.MONTH)
					&& gc1.get(Calendar.YEAR) == gc2.get(Calendar.YEAR)) {
				break;
			}
			gc1.add(Calendar.MONTH, 1);
			meses = dataIniMaior ? --meses : ++meses;
		}

		return (meses == 0 || meses < 0) ? meses : meses;// - 1;
	}

	public static Date getDataAtualComHoraEspecifica(String horaMinutoESegundoSeparadoPorDoisPontos) {
		try {
			return formatarDDMMYYYYHHMMSS(formatarData(new Date()) + " " + horaMinutoESegundoSeparadoPorDoisPontos);
		} catch (ParseException e) {
			e.printStackTrace();
		}
		return null;
	}

	public static String formatarValorMonetario(double valorMonetario) {
		DecimalFormat formatador = new DecimalFormat("###,###,##0.00");
		return formatador.format(valorMonetario);
	}

	public static String formatarData(Date data) {
		return formatarData(data, "dd/MM/yyyy");
	}

	public static String formatarDataPorExtenso(Date data) {
		Locale local = new Locale("pt", "BR");
		DateFormat dateFormat = new SimpleDateFormat("dd 'de' MMMM 'de' yyyy", local);
		return dateFormat.format(data);
	}

	public static String formatarDataPorExtensoSemDia(Date data) {
		Locale local = new Locale("pt", "BR");
		DateFormat dateFormat = new SimpleDateFormat("_____ 'de' MMMM 'de' yyyy", local);
		return dateFormat.format(data);
	}

	public static String calcularIntervaloEntreDatas(Date dataInicial, Date dataFinal) {
		Integer[] dados = getMesDiasAnoEntreDatas(dataInicial, dataFinal);
		Integer quantidadeDeDias = dados[0];
		Integer quantidadeDeMeses = dados[1];
		StringBuilder resultado = new StringBuilder();
		if (quantidadeDeMeses != null && quantidadeDeMeses > 0) {
			if (quantidadeDeMeses > 1) {
				resultado.append(quantidadeDeMeses).append(" meses");
			} else {
				resultado.append(quantidadeDeMeses).append(" mÃªs");
			}
		}
		if (quantidadeDeDias != null && quantidadeDeDias > 0) {
			if (quantidadeDeMeses != null && quantidadeDeMeses > 0) {
				resultado.append(" e ");
			}
			if (quantidadeDeDias > 1) {
				resultado.append(quantidadeDeDias).append(" dias");
			} else {
				resultado.append(quantidadeDeDias).append(" dia");
			}
		}
		return resultado.toString();
	}

	public static Integer[] getMesDiasAnoEntreDatas(Date dataInicial, Date dataFinal) {
		Integer quantidadeDeAnos = calcularDiferencasDeAnosEntreDatas(dataInicial, dataFinal);
		Integer quantidadeDeMeses = calcularDiferencasDeMesesEntreDatas(dataInicial, dataFinal);
		Integer diaDoPrimeiroMes = getDiaDaData(dataInicial);
		Integer diaDoSegundoMes = getDiaDaData(dataFinal);
		if (diaDoPrimeiroMes > diaDoSegundoMes) {
			quantidadeDeMeses = quantidadeDeMeses - 1;
		}
		Integer quantidadeDeDias = calcularDiasRestantesParaCompletarMes(dataInicial, dataFinal);
		if (isQuantidadeDeDiasIgualQuantidadeDeDiasDoMes(quantidadeDeDias)) {
			quantidadeDeDias = 0;
			quantidadeDeMeses = quantidadeDeMeses + 1;
		}
		// TODO: Alterado para atender os contratos de 12 meses que sai como 11
		// meses e 29 dias.
		if (quantidadeDeDias >= 28) { // getUltimoDiaDoMes(dataFinal)){
			quantidadeDeDias = 0;
			quantidadeDeMeses = quantidadeDeMeses + 1;
		}
		return new Integer[] { quantidadeDeDias, quantidadeDeMeses, quantidadeDeAnos };
	}

	public static int calcularDiferencasDeAnosEntreDatas(Date dataInicial, Date dataFinal) {
		try {
			GregorianCalendar inicio = new GregorianCalendar();
			GregorianCalendar termino = new GregorianCalendar();
			Integer quantidadeDeAnos = new Integer(0);
			inicio.setTime(getPrimeiroDiaDoMesEAno(dataInicial));
			termino.setTime(getPrimeiroDiaDoMesEAno(dataFinal));
			while (inicio.getTime().getTime() < termino.getTime().getTime()) {
				inicio.add(GregorianCalendar.YEAR, 1);
				quantidadeDeAnos = quantidadeDeAnos + 1;
			}
			return quantidadeDeAnos;
		} catch (Exception e) {
			e.printStackTrace();
			return 0;
		}
	}

	protected static Boolean isQuantidadeDeDiasIgualQuantidadeDeDiasDoMes(Integer quantidadeDeDias) {
		if (quantidadeDeDias >= 30) {
			return Boolean.TRUE;
		} else {
			return Boolean.FALSE;
		}
	}

	protected static Integer calcularDiasRestantesParaCompletarMes(Date dataInicial, Date dataFinal) {
		Integer quantidadeDeDias = new Integer(0);
		Integer diaDoPrimeiroMes = getDiaDaData(dataInicial);
		Integer diaDoSegundoMes = getDiaDaData(dataFinal);
		if (diaDoPrimeiroMes < diaDoSegundoMes) {
			Date dataAuxiliar = getData(diaDoPrimeiroMes, getMesDaData(dataFinal), getAnoDaData(dataFinal));
			quantidadeDeDias = calcularDiferencasDeDiasEntreDatas(dataAuxiliar, dataFinal);
		} else if (diaDoPrimeiroMes > diaDoSegundoMes) {
			Integer mes = getMesDaData(dataFinal) - 1;
			Integer ano = getAnoDaData(dataFinal);
			if (mes == 0) {
				mes = 12;
				ano = ano - 1;
			}
			Date dataAuxiliar = getData(diaDoPrimeiroMes, mes, ano);
			quantidadeDeDias = calcularDiferencasDeDiasEntreDatas(dataAuxiliar, dataFinal);
		}
		return quantidadeDeDias;
	}

	public static Integer calcularDiferencasDeDiasEntreDatas(Date dataInicial, Date dataFinal) {
		GregorianCalendar inicio = new GregorianCalendar();
		GregorianCalendar termino = new GregorianCalendar();
		Integer quantidadeDeDias = new Integer(0);
		inicio.setTime(dataInicial);
		termino.setTime(dataFinal);
		while (inicio.getTime().getTime() <= termino.getTime().getTime()) {
			inicio.add(GregorianCalendar.DAY_OF_MONTH, 1);
			quantidadeDeDias = quantidadeDeDias + 1;
		}

		return quantidadeDeDias;
	}

	public static Integer calcularDiferencasDeMesesEntreDatas(Date dataInicial, Date dataFinal) {
		GregorianCalendar inicio = new GregorianCalendar();
		GregorianCalendar termino = new GregorianCalendar();
		Integer quantidadeDeMeses = new Integer(0);
		inicio.setTime(getPrimeiroDiaDoMesEAno(dataInicial));
		termino.setTime(getPrimeiroDiaDoMesEAno(dataFinal));
		while (inicio.getTime().getTime() < termino.getTime().getTime()) {
			inicio.add(GregorianCalendar.MONTH, 1);
			quantidadeDeMeses = quantidadeDeMeses + 1;
		}
		return quantidadeDeMeses;
	}

	public static Integer calcularRestanteDeDiasEntreDatas(Date dataInicial, Date dataFinal) {
		int meses = calcularDiferencasDeMesesEntreDatas(dataInicial, dataFinal);
		GregorianCalendar inicio = new GregorianCalendar();
		GregorianCalendar termino = new GregorianCalendar();
		inicio.setTime(getPrimeiroDiaDoMesEAno(dataInicial));
		termino.setTime(dataFinal); // getPrimeiroDiaDoMesEAno(dataFinal));
		inicio.add(GregorianCalendar.MONTH, meses);
		if (inicio.getTime().compareTo(termino.getTime()) >= 0) {
			return 0;
		}

		return calcularDiferencasDeDiasEntreDatas(inicio.getTime(), termino.getTime());
	}

	protected static String formatar(String valor, String mascara) {

		String dado = "";
		for (int i = 0; i < valor.length(); i++) {
			char c = valor.charAt(i);
			if (Character.isDigit(c)) {
				dado += c;
			}
		}

		int indMascara = mascara.length();
		int indCampo = dado.length();

		for (; indCampo > 0 && indMascara > 0;) {
			if (mascara.charAt(--indMascara) == '#') {
				indCampo--;
			}
		}

		String saida = "";
		for (; indMascara < mascara.length(); indMascara++) {
			saida += ((mascara.charAt(indMascara) == '#') ? dado.charAt(indCampo++) : mascara.charAt(indMascara));
		}
		return saida;
	}

	public static String formatarCpf(String cpf) {
		while (cpf.length() < 11) {
			cpf = "0" + cpf;
		}
		return formatar(cpf, "###.###.###-##");
	}

	public static String formatarCnpj(String cnpj) {
		while (cnpj.length() < 14) {
			cnpj = "0" + cnpj;
		}
		return formatar(cnpj, "##.###.###/####-##");
	}

	public static Date adicionarAnosADataAtual(int anos) {
		GregorianCalendar data = new GregorianCalendar();
		data.setTime(getData(01, 01, getAnoDaData(new Date())));
		data.add(GregorianCalendar.YEAR, anos);
		return data.getTime();
	}

	private static Double formatarValorMonetarioComVirgula(String parameter) throws ParseException {
		return Double.valueOf(parameter.replace(".", "").replace(",", "."));
	}

	public static Double formatarValorMonetario(String parameter) throws ParseException {
		try {
			return new DecimalFormat("###,###,##0.00").parse(parameter).doubleValue();
		} catch (ParseException pe) {
			return formatarValorMonetarioComVirgula(parameter);
		}
	}

	public static String completaCaracters(boolean esquerda, char caracter, int qtdTotal, String texto) {
		for (int i = texto.length(); i < qtdTotal; i++) {
			if (esquerda) {
				texto = caracter + texto;
			} else {
				texto += caracter;
			}
		}
		return texto;
	}

	public static String completaCaracters(boolean esquerda, String caracter, int qtdTotal, String texto) {
		for (int i = texto.length(); i < qtdTotal; i++) {
			if (esquerda) {
				texto = caracter + texto;
			} else {
				texto += caracter;
			}
		}
		return texto;
	}

	public static StringBuilder completaCaracters(boolean esquerda, String caracter, int qtdTotal,
			StringBuilder texto) {
		for (int i = texto.length(); i < qtdTotal; i++) {
			if (esquerda) {
				texto.insert(0, caracter);
			} else {
				texto.append(caracter);
			}
		}
		return texto;
	}

	public static String removerFormatacaoCEP(String cep) {
		if (cep != null) {
			return cep.replaceAll("[^0-9]*", "");
		}
		return null;
	}

	public static String retiraCaractersEspeciais(String passa) {
		passa = passa.replaceAll("[Ã‚Ã€Ã�Ã„Ãƒ]", "A");
		passa = passa.replaceAll("[Ã¢Ã£Ã Ã¡Ã¤]", "a");
		passa = passa.replaceAll("[ÃŠÃˆÃ‰Ã‹]", "E");
		passa = passa.replaceAll("[ÃªÃ¨Ã©Ã«]", "e");
		passa = passa.replaceAll("ÃŽÃ�ÃŒÃ�", "I");
		passa = passa.replaceAll("Ã®Ã­Ã¬Ã¯", "i");
		passa = passa.replaceAll("[Ã”Ã•Ã’Ã“Ã–]", "O");
		passa = passa.replaceAll("[Ã´ÃµÃ²Ã³Ã¶]", "o");
		passa = passa.replaceAll("[Ã›Ã™ÃšÃœ]", "U");
		passa = passa.replaceAll("[Ã»ÃºÃ¹Ã¼]", "u");
		passa = passa.replaceAll("Ã‡", "C");
		passa = passa.replaceAll("Ã§", "c");
		passa = passa.replaceAll("[Ã½Ã¿]", "y");
		passa = passa.replaceAll("Ã�", "Y");
		passa = passa.replaceAll("Ã±", "n");
		passa = passa.replaceAll("Ã‘", "N");
		passa = passa.replaceAll("['<>\\|/]", "");
		return passa;
	}

	public static String retiraPonto(String passa) {
		return passa.replaceAll("\\p{Punct}", "");
	}

	public static GregorianCalendar getDataComHoraMinutoSegundoZerado(Date dataOrigem) {
		GregorianCalendar dataBase = convertDataCalendar(dataOrigem);
		dataBase.set(Calendar.HOUR_OF_DAY, 0);
		dataBase.set(Calendar.MINUTE, 0);
		dataBase.set(Calendar.SECOND, 0);
		dataBase.set(Calendar.MILLISECOND, 0);
		return dataBase;
	}

	public static boolean intToBool(Object integer) {
		return ((integer != null) && ((Integer) integer == 1)) ? true : false;
	}

	public static Calendar incrementaMes(GregorianCalendar dataBase, int qtdMeses) {
		dataBase.set(Calendar.MONTH, (dataBase.get(Calendar.MONTH) + qtdMeses));
		return dataBase;
	}

	public static Calendar decrementaMes(GregorianCalendar dataBase, int qtdMeses) {
		dataBase.set(Calendar.MONTH, (dataBase.get(Calendar.MONTH) - qtdMeses));
		return dataBase;
	}

	public static Calendar incrementaMes(Date dataTermino, int qtdMeses) {
		return incrementaMes(convertDataCalendar(dataTermino), qtdMeses);
	}

	public static GregorianCalendar convertDataCalendar(Date dataTermino) {
		GregorianCalendar greg = new GregorianCalendar();
		greg.setTime(dataTermino);
		return greg;
	}

	public static Calendar incrementaDia(GregorianCalendar dataBase, int qtdDias) {
		dataBase.add(Calendar.DAY_OF_MONTH, qtdDias);
		return dataBase;
	}

	public static Calendar incrementaDia(Date dataTermino, int qtdDias) {
		return incrementaDia(convertDataCalendar(dataTermino), qtdDias);
	}

	public static Calendar incrementaAno(Date dataInclusao, int qtdDias) {
		return incrementaAno(convertDataCalendar(dataInclusao), qtdDias);
	}

	public static Calendar incrementaAno(GregorianCalendar dataBase, int qtdDias) {
		dataBase.add(Calendar.YEAR, qtdDias);
		return dataBase;
	}

	public static Date formatarDataDDMMYYYY(String data) throws ParseException {
		return formatarData(data, "dd/MM/yyyy");
	}

	public static Date formatarDDMMYYYYHHMMSS(String dataEHora) throws ParseException {
		return formatarData(dataEHora, "dd/MM/yyyy hh:mm:ss");
	}

	public static Date formatarData(String data, String mascara) throws ParseException {
		return (data == null || data.isEmpty()) ? null : new SimpleDateFormat(mascara).parse(data);
	}

	public static String formatarData(Date data, String mascara) {
		if (data == null) {
			return "Data nÃ£o informada!";
		}
		return new SimpleDateFormat(mascara).format(data);
	}

	public static String getNumeroDecimal(int numero) {
		switch (numero) {
		case 1:
			return "PRIMEIRO";
		case 2:
			return "SEGUNDO";
		case 3:
			return "TERCEIRO";
		case 4:
			return "QUARTO";
		case 5:
			return "QUINTO";
		case 6:
			return "SEXTO";
		case 7:
			return "SÃ‰TIMO";
		case 8:
			return "OITAVO";
		case 9:
			return "NONO";
		case 10:
			return "DÃ‰CIMO";
		}
		return "";
	}

	public static String formatarValorPercentual(double valor) {
		return new DecimalFormat("#,##0.00%").format(valor);
	}

	public static String formatarValorPercentual(double valor, int casas) {
		String zeros = "0.";
		for (int i = 0; i < casas; i++) {
			zeros = zeros + "0";
		}
		String formatador;
		if (casas > 0) {
			formatador = new DecimalFormat(zeros + "%").format(valor);
		} else {
			formatador = new DecimalFormat("#0.00%").format(valor);
		}
		return formatador;
	}

	public static int getPeriodoCurso(Date dataConclusao) {
		return (convertDataCalendar(dataConclusao).get(Calendar.MONTH) >= -1
				&& convertDataCalendar(dataConclusao).get(Calendar.MONTH) <= 5) ? 1 : 2;
	}

	/**
	 * 
	 * Retorna quantos dias de diferenÃ§a existem entre uma dataA e uma dataB.
	 * 
	 * @author Henrique Santiago - 02/08/2013 - 17:38:59
	 * 
	 * @param dataA
	 * @param dataB
	 * @return A quantidade de dias que Ã© a diferenÃ§a entre a dataA e a dataB.
	 */
	public static int diferencaEmDias(Date dataA, Date dataB) {
		int diferencaTemporaria = 0;
		int diferencaEmDias = 0;
		Calendar menorData = Calendar.getInstance();
		Calendar maiorData = Calendar.getInstance();
		if (dataA.compareTo(dataB) < 0) {
			menorData.setTime(dataA);
			maiorData.setTime(dataB);
		} else {
			menorData.setTime(dataB);
			maiorData.setTime(dataA);
		}
		while (menorData.get(Calendar.YEAR) != maiorData.get(Calendar.YEAR)) {
			diferencaTemporaria = 365 * (maiorData.get(Calendar.YEAR) - menorData.get(Calendar.YEAR));
			diferencaEmDias += diferencaTemporaria;
			menorData.add(Calendar.DAY_OF_YEAR, diferencaTemporaria);
		}
		if (menorData.get(Calendar.DAY_OF_YEAR) != maiorData.get(Calendar.DAY_OF_YEAR)) {
			diferencaTemporaria = maiorData.get(Calendar.DAY_OF_YEAR) - menorData.get(Calendar.DAY_OF_YEAR);
			diferencaEmDias += diferencaTemporaria;
			menorData.add(Calendar.DAY_OF_YEAR, diferencaTemporaria);
		}
		return diferencaEmDias;
	}

	/**
	 * 
	 * TODO: Faca uma descricao suscinta do metodo.
	 * 
	 * @author Henrique Santiago - 02/08/2013 - 17:39:29
	 * 
	 * @param dataA
	 * @param dataB
	 * @return
	 */
	public static boolean dataMenorOuIgual(Date dataA, Date dataB) {
		return diferencaEmDias(dataA, dataB) == 0 || dataA.before(dataB);
	}

	/**
	 * 
	 * TODO: Faca uma descricao suscinta do metodo.
	 * 
	 * @author Henrique Santiago - 02/08/2013 - 17:39:51
	 * 
	 * @param dataA
	 * @param dataB
	 * @return
	 */
	public static boolean dataMaiorOuIgual(Date dataA, Date dataB) {
		return diferencaEmDias(dataA, dataB) == 0 || dataA.after(dataB);
	}

	/**
	 * 
	 * TODO: Faca uma descricao suscinta do metodo.
	 * 
	 * @author Henrique Santiago - 02/08/2013 - 17:39:54
	 * 
	 * @param dataA
	 * @param dataB
	 * @return
	 */
	public static boolean dataMaior(Date dataA, Date dataB) {
		return dataA.after(dataB);
	}

	/**
	 * 
	 * TODO: Faca uma descricao suscinta do metodo.
	 * 
	 * @author Henrique Santiago - 02/08/2013 - 17:39:57
	 * 
	 * @param dataA
	 * @param dataB
	 * @return
	 */
	public static boolean dataMenor(Date dataA, Date dataB) {
		return dataA.before(dataB);
	}

	/**
	 * Monta um Array <br/>
	 * 
	 * @param args
	 * @return
	 */
	public static <T> T[] montarArray(@SuppressWarnings("unchecked") T... args) {
		return args;
	}

	public static void serializarObjeto(Object objeto, String path) {

		try {
			FileOutputStream fileOut = new FileOutputStream(path);
			ObjectOutputStream out = new ObjectOutputStream(fileOut);
			out.writeObject(objeto);
			out.close();
			fileOut.close();
			System.out.printf("Serialized data is saved in /tmp/employee.ser");
		} catch (IOException i) {
			i.printStackTrace();
		}
	}

	@SuppressWarnings("unchecked")
	public static <T> T desserializarObjeto(T classe, Object objeto, String path) {
		T resultado = null;
		try {
			FileInputStream fileIn = new FileInputStream(path);
			ObjectInputStream in = new ObjectInputStream(fileIn);
			resultado = (T) in.readObject();
			in.close();
			fileIn.close();
		} catch (IOException i) {
			i.printStackTrace();

		} catch (ClassNotFoundException c) {
			System.out.println("Employee class not found");
			c.printStackTrace();

		}
		return resultado;
	}

}
