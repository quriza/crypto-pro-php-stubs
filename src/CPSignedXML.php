<?php


/**
 * Предоставляет свойства и методы для работы с подписанным сообщением. Реализует сдедующие интерфейсы: ICPSignedData4, ICPSignedData3, ICPSignedData2, ICPSignedData, CAPICOM.SignedData
 *
 * @link https://docs.cryptopro.ru/cades/reference/cadescom/cadescom_interface/isignedxml
 */
class CPSignedXML
{

	public function __construct(){}

	/**
	 *
	 * Задает данные для подписания
	 *
	 * @param string $content Документ XML, который следует подписать
	 *  							Документ должен быть в кодировке UTF-8. Если кодировка документа отличается от UTF-8,
	 *  							то его следует закодировать в BASE64.
	 *
	 * @return void
	 */
	public function set_Content(string $content){}

	/**
	 * Возвращает данные для подписания
	 * @return string
	 */
	public function get_Content(): string{}

	/**
	 * Задает тип подписи
	 * @param mixed $signatureType Тип  подписи. По умолчанию CADESCOM_XML_SIGNATURE_TYPE_ENVELOPED.
	 *                                        Может принимать следующие значения:
	 *                                        <table class="table">
	 *                                        <table>
	 *                                        <thead>
	 *                                        <tr>
	 *                                        <th>Имя</th>
	 *                                         <th>Описание</th>
	 *                                        <th>Значение</th>
	 *                                        </tr>
	 *                                        </thead>
	 *                                        <tbody>
	 *                                        <tr>
	 *                                        <td>XML_SIGNATURE_TYPE_ENVELOPED</td>
	 * 										  <td>Вложенная подпись</td>
	 *                                        <td>0</td>
	 *                                        </tr>
	 *                                        <tr>
	 *                                        <td>XML_SIGNATURE_TYPE_ENVELOPING</td>
	 *                                          <td>Оборачивающая подпись</td>
	 *                                        <td>1</td>
	 *                                        </tr>
	 *                                         <tr>
	 *                                         <td>XML_SIGNATURE_TYPE_TEMPLATE</td>
	 *                                           <td>Подпись по шаблону</td>
	 *                                         <td>2</td>
	 *                                         </tr>
	 * 											</tbody></table>
	 *
	 *
	 * @return void
	 */
	public function set_SignatureType(){}


	/**
	 *
	 * Задаёт Uniform Resource Identifier (URI) алгоритма хэширования. Данное значение помещается
	 * в элемент <DigestMethod xmlns="http://www.w3.org/2000/09/xmldsig#>.
	 * Соответствующий алгоритм используется для хэширования подписываемых частей документа XML.
	 *
	 * Для использования доступны следующие URI:
	 * urn:ietf:params:xml:ns:cpxmlsec:algorithms:gostr3411 (значение по умолчанию),
	 * urn:ietf:params:xml:ns:cpxmlsec:algorithms:gostr34112012-512,
	 * urn:ietf:params:xml:ns:cpxmlsec:algorithms:gostr34112012-256
	 *
	 * Если при создании подписи по шаблону в элементе <DigestMethod xmlns="http://www.w3.org/2000/09/xmldsig#>
	 * уже указан алгоритм хэширования, то используется значение, указанное в шаблоне,
	 * а не заданное в данном свойстве
	 *
	 * Свойство доступно только для записи.
 *
	 * @param  int $digestMethod
	 * @return void
	 */
	public function set_DigestMethod($digestMethod){}

	/**
	 *
	 * Задаёт Uniform Resource Identifier (URI) алгоритма хэширования.
	 * Данное значение помещается в элемент <DigestMethod xmlns="http://www.w3.org/2000/09/xmldsig#>.
	 * Соответствующий алгоритм используется для хэширования подписываемых частей документа XML.
	 *
	 * Для использования доступны следующие URI:
	 * urn:ietf:params:xml:ns:cpxmlsec:algorithms:gostr3411 (значение по умолчанию),
	 * urn:ietf:params:xml:ns:cpxmlsec:algorithms:gostr34112012-512,
	 * urn:ietf:params:xml:ns:cpxmlsec:algorithms:gostr34112012-256
	 *
	 * Если при создании подписи по шаблону в элементе <DigestMethod xmlns="http://www.w3.org/2000/09/xmldsig#>
	 *     уже указан алгоритм хэширования, то используется значение, указанное в шаблоне,
	 *     а не заданное в данном свойстве.
	 *
	 * @param  int $signatureMethod
	 * @return void
	 */
	public function set_SignatureMethod($signatureMethod){}

	/**
	 * Свойство Signers позволяет получить информацию о подписях, которые содержатся в подписанном документе XML.
	 * Данное свойство доступно только после проверки подписи.
	 * Коллекция подписей.
	 *
	 * @return mixed
	 */
	public function get_Signers(){}

	/**
	 *
	 *
	 * Метод Sign позволяет создать вложенную, оборачивающую
	 * подпись или подпись в готовом шаблоне документа XML. Тип подписи следует задать при помощи свойства SignatureType.
	 *
	 * @param  CPSigner $signer    Объект CPSigner или CAPICOM.Signer, который будет использован
	 * 											для создания подписи. По умолчанию не задан, при этом выбор сертификата
	 * 											для подписи производится аналогично методу Sign объекта CAPICOM.SignedData
	 * 											при отсутствии первого параметра. Таким же образом выбор
	 * 											сертификата для подписи производится в случае,
	 * 											если параметр Signer задан, но не содержит сертификата для подписи.
	 * @param string $xPath  XPath-запрос для поиска элементов , в которых следует создать подпись.
	 * 								 			Если данный параметр не задан, то подпись будет создана во всех элементах,
	 * 											в которых отсутствует или не заполнен вложенный элемент .
	 * 											Данный параметр используется только при создании подписи по шаблону.
	 * 											Для остальных типов подписи параметр XPath будет проигнорирован.
	 *
	 *
	 * @return string подписанный документ XML
	 */
	public function Sign($signer,$xPath): string {}

	/**
	 * Проверяет подпись XML документа
	 *
	 * @param   string  $signedMessage  Подписанный документ XML. Документ должен быть в кодировке UTF-8.
	 * 									Если кодировка документа отличается от UTF-8, то его следует закодировать в BASE64
	 *
	 * @param string $xPath 			XPath-запрос для поиска проверяемых элементов <Signature xmlns="http://www.w3.org/2000/09/xmldsig#>.
	 * 									Если данный параметр не задан, то будут проверены все элементы
	 * 									<Signature xmlns="http://www.w3.org/2000/09/xmldsig#> в документе.
	 *
	 * @return string|void
	 */
	public function Verify(
		string $signedMessage,
		string $xPath
	){}

}
