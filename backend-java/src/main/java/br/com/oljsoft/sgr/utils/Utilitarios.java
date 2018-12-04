package br.com.oljsoft.sgr.utils;

import java.math.BigDecimal;
import java.text.DecimalFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import br.com.oljsoft.sgr.utils.dto.BancoDTO;
import br.com.oljsoft.sgr.utils.dto.EstadoDTO;
import br.com.oljsoft.sgr.utils.dto.ObjetoEnumDTO;
import br.com.oljsoft.sgr.utils.enuns.EnumBancos;
import br.com.oljsoft.sgr.utils.enuns.IEnum;
import br.com.oljsoft.sgr.utils.enuns.IEnumEstado;

public abstract class Utilitarios {

	public static Date converterStringEmTime(String string) throws ParseException {
		SimpleDateFormat formatador = new SimpleDateFormat("HH:mm");
		return formatador.parse(string);
	}

	public static Date parseDate(String string) {
		SimpleDateFormat formatador = new SimpleDateFormat("yyyy-MM-dd");
		try {
			return formatador.parse(string);
		} catch (ParseException e) {
		}
		return null;
	}

	public static String formatarDataString(Date date) throws ParseException {
		SimpleDateFormat formatador = new SimpleDateFormat("dd/MM/yyyy");
		return formatador.format(date);
	}

	public static List<EstadoDTO> getSelectItemEnumEestado(IEnumEstado[] enuns) {
		List<EstadoDTO> resultado = new ArrayList<EstadoDTO>();
		for (IEnumEstado tipo : enuns) {
			resultado.add(new EstadoDTO(tipo.getCodigo(), tipo.getDescricao(), tipo.getUf(), tipo.getPais()));
		}
		return resultado;
	}
	
	public static List<BancoDTO> getSelectItemEnumBanco(EnumBancos[] enuns) {
		List<BancoDTO> resultado = new ArrayList<BancoDTO>();
		for (EnumBancos tipo : enuns) {
			resultado.add(new BancoDTO(tipo.getStatus(), tipo.getCodigo(), tipo.getDescricao(), tipo.toString()));
		}
		return resultado;
	}
	
	public static List<ObjetoEnumDTO> getSelectItemEnum(IEnum[] enuns) {
		List<ObjetoEnumDTO> resultado = new ArrayList<ObjetoEnumDTO>();
		for (IEnum tipo : enuns) {
			resultado.add(new ObjetoEnumDTO(tipo.getStatus(), tipo.getDescricao()));
		}
		return resultado;
	}
	
	public static String converteMoeadas(BigDecimal valor) {
		DecimalFormat decFormat = new DecimalFormat("'R$' #,###,##0.00");
		return decFormat.format(valor).toString();
	}

}
