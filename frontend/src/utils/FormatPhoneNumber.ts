export function formatPhoneNumber(phoneNumber: string): string {
  const cleanedNumber = phoneNumber.replace(/\s+/g, '')

  const regex = /(.*?)(\d{4})(\d{4})?$/
  const match = regex.exec(cleanedNumber)

  if (!match) {
    throw new Error('El número no tiene un formato válido.')
  }

  const prefix = match[1]
  const group1 = match[2]
  const group2 = match[3] || ''

  return `${prefix.trim()} ${group1} ${group2}`.trim()
}
